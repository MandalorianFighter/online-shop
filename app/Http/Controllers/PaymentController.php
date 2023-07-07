<?php

namespace App\Http\Controllers;

use DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $data = json_encode($request->except('_token', 'payment_type'));
        $payment_type = $request->payment_type;
        $cart = Cart::content();
        $settings = Setting::first();

        if(Session::has('coupon')) {
            $total = Session::get('coupon')['balance'] + $settings->shipping_charge + $settings->vat;
        } else {
            $total = Cart::subtotal() + $settings->shipping_charge + $settings->vat;
        }
        
        if($request->payment_type == 'stripe') {
            $key = env('STRIPE_KEY');
            return view('pages.payment.stripe', compact('data', 'cart', 'settings', 'total', 'payment_type', 'key'));
        } elseif ($request->payment_type == 'paypal') {

        } elseif ($request->payment_type == 'ideal') {

        } else {
            echo "Cash On Delivery";
        }
    }

    // private function stripeCharge(Request $request, Setting $settings)
    // {
    //     \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     $data = $request->all();
    //     $cart = Cart::content();
    //     function calculateOrderAmount(Setting $settings): int {
    //         // Replace this constant with a calculation of the order's amount
    //         // Calculate the order total on the server to prevent
    //         // people from directly manipulating the amount on the client

    //         if(Session::has('coupon')) {
    //             $total = (Session::get('coupon')['balance'] + $settings->shipping_charge + $settings->vat)*100;
    //         } else {
    //             $total = (Cart::subtotal() + $settings->shipping_charge + $settings->vat)*100;
    //         }    
    //         return $total;
    //     }

    //     header('Content-Type: application/json');

    //     try {
    //         // Create a PaymentIntent with amount and currency
    //         $paymentIntent = \Stripe\PaymentIntent::create([
    //             'amount' => calculateOrderAmount($settings),
    //             'currency' => 'usd',
    //             'automatic_payment_methods' => [
    //                 'enabled' => true,
    //             ],
    //         ]);

    //         $output = [
    //             'clientSecret' => $paymentIntent->client_secret,
    //         ];

    //     } catch (Error $e) {
    //         http_response_code(500);
    //         $output = json_encode(['error' => $e->getMessage()]);
    //     }
    //     return view('pages.payment.stripe', compact('data', 'cart', 'settings', 'output'));
    // }

    public function stripeCharge(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            
            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
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
                'paying_amount' => $charge->amount,
                'balance_transaction' => $charge->balance_transaction,
                'order_id' => $charge->metadata->order_id,
                'shipping' => $request->shipping_charge,
                'vat' => $request->vat,
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

            $shipping_info = json_decode($request->shipping_info, true);

            $shipping = array_merge(['order_id' => $order_id], $shipping_info);

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

    public function paymentSuccess(Request $request) 
    {
        if($request->payment_intent && $request->payment_intent_client_secret && $request->redirect_status == 'succeeded') {
            Cart::destroy();
            return view('pages.payment.complete');
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
