<?php

namespace App\Http\Controllers;

use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Mail;
use App\Mail\InvoiceMail;

class PaymentController extends Controller
{
    protected $settings;

    public function __construct()
    {
        $this->settings = Setting::first();
    }

    public function payment(Request $request)
    {
        $shipping = $request->except('_token', 'payment_type');
        Session::put('shipping', $shipping);

        $payment_type = $request->payment_type;
        $cart = Cart::content();
        
        
        if(Session::has('coupon')) {
            $total = Session::get('coupon')['balance'] + $this->settings->shipping_charge + $this->settings->vat;
        } else {
            $total = Cart::subtotal() + $this->settings->shipping_charge + $this->settings->vat;
        }
        $settings = $this->settings;
        if($request->payment_type == 'stripe') {
            return view('pages.payment.stripe', compact('cart', 'total', 'payment_type', 'settings'));
        } elseif ($request->payment_type == 'paypal') {
            return $this->paypalCreate($total);
        } elseif ($request->payment_type == 'oncash') {
            return view('pages.payment.oncash', compact('cart', 'total', 'payment_type', 'settings'));
        }
    }

    public function stripeCharge(Request $request)
    {
        $email = auth()->user()->email;
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            
            $token = $_POST['stripeToken'];
            
            $charge = \Stripe\Charge::create([
              'amount' => $request->total*100,
              'currency' => 'usd',
              'description' => 'OneSport Ecommerce Charge',
              'source' => $token,
              'metadata' => ['order_id' => uniqid()],
            ]);

            // Orders

            $data = [
                'user_id' => auth()->id(),
                'payment_type' => $request->payment_type,
                'payment_id' => $charge->payment_method,
                'paying_amount' => $charge->amount/100,
                'balance_transaction' => $charge->balance_transaction,
                'order_id' => $charge->metadata->order_id,
                'shipping' => $this->settings->shipping_charge,
                'vat' => $this->settings->vat,
                'total' => $request->total,
                'subtotal' => Session::has('coupon') ? Session::get('coupon')['balance'] : Cart::subtotal(),
                'status' => 0,
                'date' => date('d-m-y'),
                'month' => date('F'),
                'year' => date('Y'),
                'status_code' => mt_rand(100000,999999),
            ];

            $order_id = DB::table('orders')->insertGetId($data);

            // Mail to User

            Mail::to($email)->send(new InvoiceMail($data));

            // Shipping

            $shipping_info = Session::get('shipping');

            $shipping = array_merge(['order_id' => $order_id], $shipping_info);

            Session::forget('shipping');
            DB::table('shipping')->insert($shipping);

            // Order Details

            $content = Cart::content();

            foreach($content as $item) {
                $details = [
                    'order_id' => $order_id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'color' => $item->options->color,
                    'size' => $item->options->size,
                    'qty' => $item->qty,
                    'single_price' => $item->price,
                    'total_price' => $item->price*$item->qty,
                ];
                DB::table('order_details')->insert($details);
            }

            Cart::destroy();
            if(Session::has('coupon')) Session::forget('coupon');

            return redirect()->route('payment.success');
    }

    protected function paypalCreate($total)
    {
        // Set up Omnipay PayPal gateway
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->initialize(config('services.paypal.options'));

        // Prepare the purchase parameters
        $parameters = [
            'amount' => $total,
            'currency' => 'USD',
            'description' => 'Test Payment Description',
            'returnUrl' => route('paypal.execute'),
            'cancelUrl' => route('payment.cancel'),
        ];

        // Generate the payment form and redirect the user
        $response = $gateway->purchase($parameters)->send();
        
        $redirectUrl = $response->getRedirectUrl();

        return redirect()->away($redirectUrl);
    }

    public function paypalCharge(Request $request)
    {
        // Retrieve the necessary data from the request
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $shipping_info = Session::get('shipping');


        // Set up PayPal gateway and initialize it
        $gateway = Omnipay::create('PayPal_Rest');
        $gateway->initialize(config('services.paypal.options'));

        // Prepare the completePurchase parameters
        $parameters = [
            'payer_id' => $payerId,
            'transactionReference' => $paymentId,
            'metadata' => ['order_id' => uniqid()],
        ];

        // Perform the payment completion
        $response = $gateway->completePurchase($parameters)->send();

        // Check if the payment was successful
        if ($response->isSuccessful()) {
            $email = auth()->user()->email;
            $arr = $response->getData();
            
            // Orders

            $data = [
                'user_id' => auth()->id(),
                'payment_type' => $arr['payer']['payment_method'],
                'payment_id' => $arr['id'],
                'paying_amount' => $arr['transactions']['0']['amount']['total'],
                'balance_transaction' => $arr['transactions']['0']['related_resources']['0']['sale']['id'],
                'order_id' => null,
                'shipping' => $this->settings->shipping_charge,
                'vat' => $this->settings->vat,
                'total' => $arr['transactions']['0']['amount']['total'],
                'subtotal' => Session::has('coupon') ? Session::get('coupon')['balance'] : Cart::subtotal(),
                'status' => 0,
                'date' => date('d-m-y'),
                'month' => date('F'),
                'year' => date('Y'),
                'status_code' => mt_rand(100000,999999),
            ];

            $order_id = DB::table('orders')->insertGetId($data);

            // Mail to User

            Mail::to($email)->send(new InvoiceMail($data));

            $shipping = array_merge(['order_id' => $order_id], $shipping_info);

            Session::forget('shipping');
            DB::table('shipping')->insert($shipping);

            // Order Details

            $content = Cart::content();

            foreach($content as $item) {
                $details = [
                    'order_id' => $order_id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'color' => $item->options->color,
                    'size' => $item->options->size,
                    'qty' => $item->qty,
                    'single_price' => $item->price,
                    'total_price' => $item->price*$item->qty,
                ];
                DB::table('order_details')->insert($details);
            }

            Cart::destroy();
            if(Session::has('coupon')) Session::forget('coupon');

            // Payment successful, perform further actions (e.g., update database, send notifications)
            return redirect()->route('payment.success');
        } else {
            // Payment failed, redirect to failure page
            return redirect()->route('payment.failure');
        }
    }

    public function oncashCharge(Request $request)
    {
        $email = auth()->user()->email;
            // Orders

            $data = [
                'user_id' => auth()->id(),
                'payment_type' => $request->payment_type,
                'shipping' => $this->settings->shipping_charge,
                'vat' => $this->settings->vat,
                'total' => $request->total,
                'subtotal' => Session::has('coupon') ? Session::get('coupon')['balance'] : Cart::subtotal(),
                'status' => 0,
                'date' => date('d-m-y'),
                'month' => date('F'),
                'year' => date('Y'),
                'status_code' => mt_rand(100000,999999),
            ];

            $order_id = DB::table('orders')->insertGetId($data);

            // Shipping

            $shipping_info = Session::get('shipping');

            $shipping = array_merge(['order_id' => $order_id], $shipping_info);

            Session::forget('shipping');
            DB::table('shipping')->insert($shipping);

            // Order Details

            $content = Cart::content();

            foreach($content as $item) {
                $details = [
                    'order_id' => $order_id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'color' => $item->options->color,
                    'size' => $item->options->size,
                    'qty' => $item->qty,
                    'single_price' => $item->price,
                    'total_price' => $item->price*$item->qty,
                ];
                DB::table('order_details')->insert($details);
            }

            Cart::destroy();
            if(Session::has('coupon')) Session::forget('coupon');

            $notification = array(
                'message' => __('Order Process Successfully Done!'),
                'alert-type' => 'success',
            );
    
            return redirect()->route('home')->with($notification);
    }

    public function paymentSuccess() 
    {
        Cart::destroy();
        return view('pages.payment.success');
    }

    public function paymentCancel() 
    {
        return view('pages.payment.cancel');
    }

    public function paymentFailure() 
    {
        return view('pages.payment.failure');
    }
}
