@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
            <h5>{{ __('Order Details') }}</h5>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">{{ __('Order Details') }}</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">{{ __('Order Details') }}</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>{{ __('Name:') }} </th>
                                        <th>{{ $order->user->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Phone') }}: </th>
                                        <th>{{ $order->user->phone }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Payment Type') }}: </th>
                                        <th>{{ $order->payment_type }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Payment ID') }}: </th>
                                        <th>{{ $order->payment_id ? $order->payment_id : '-' }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Total') }}: </th>
                                        <th>{{ $order->total }} $</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Month') }}: </th>
                                        <th>{{ $order->month }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Date') }}: </th>
                                        <th>{{ $order->date }}</th>
                                    </tr>
                                </table>
                            </div>


                        </div>
                    </div>   
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">{{ __('Shipping Details') }}</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>{{ __('Name:') }} </th>
                                        <th>{{ $shipping->shipping_name }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Phone') }}: </th>
                                        <th>{{ $shipping->shipping_phone }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Email') }}: </th>
                                        <th>{{ $shipping->shipping_email }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Address') }}: </th>
                                        <th>{{ $shipping->shipping_address }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('City') }}: </th>
                                        <th>{{ $shipping->shipping_city }}</th>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Status') }}: </th>
                                        <th>
                                            @if($order->status == 0)
                                                <span class="badge badge-warning">{{ __('Pending') }}</span>
                                            @elseif($order->status == 1)
                                            <span class="badge badge-info">{{ __('Payment Accepted') }}</span>
                                            @elseif($order->status == 2)
                                            <span class="badge badge-warning">{{ __('Progress') }}</span>
                                            @elseif($order->status == 3)
                                            <span class="badge badge-success">{{ __('Delivered') }}</span>
                                            @else
                                            <span class="badge badge-danger">{{ __('Canceled') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    
                                </table>
                            </div>


                        </div>
                    </div>   
                </div>

                <div class="row">
                <div class="card pd-20 pd-sm-40 col-lg-12">
                <h6 class="card-body-title">{{ __('Product Details') }}</h6>

                <div class="table-wrapper">
                    <table class="table display responsive nowrap">
                    <thead>
                        <tr>
                        <th class="wd-10p">{{ __('Product ID') }}</th>
                        <th class="wd-20p">{{ __('Product Name') }}</th>
                        <th class="wd-10p">{{ __('Image') }}</th>
                        <th class="wd-10p">{{ __('Color') }}</th>
                        <th class="wd-10p">{{ __('Size') }}</th>
                        <th class="wd-10p">{{ __('Quantity') }}</th>
                        <th class="wd-10p">{{ __('Price') }}</th>
                        <th class="wd-10p">{{ __('Total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                
                    @foreach ($details as $product)
                        <tr>
                        <td>{{ $product->product->code }}</td>
                        <td title="{{ $product->product_name }}">{{ $product->product_name }}</td>
                        <td><img src="{{ $product->product->getFirstMediaUrl('products/imageOne', 'thumb') }}" alt="{{ $product->name }} logo" height="70em" max-width="100%"></td>
                        <td>{{ $product->color }}</td>
                        <td>{{ $product->size }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->single_price }}</td>
                        <td>{{ $product->total_price }}</td>
                        
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div><!-- table-wrapper -->
                </div><!-- card -->


                </div>
            @if($order->status == 0)
                <a href="{{ route('admin.accept_payment', $order) }}" class="btn btn-info">{{ __('Payment Accept') }}</a>
                <a href="{{ route('admin.cancel_payment', $order) }}" class="btn btn-danger">{{ __('Order Cancel') }}</a>
            @elseif($order->status == 1)
                <a href="{{ route('admin.process_delivery', $order) }}" class="btn btn-info">{{ __('Process Delivery') }}</a>
            @elseif($order->status == 2)
                <a href="{{ route('admin.delivery_success', $order) }}" class="btn btn-success">{{ __('Delivery Done') }}</a>
            @elseif($order->status == 4)
            <strong class="text-danger text-center">{{ __('This order is not valid.') }}</strong>
            @else
            <strong class="text-success text-center">{{ __('This order is successfully delivered.') }}</strong>
            @endif
            <div/>
        </div>
    </div><!-- sl-mainpanel -->
@endsection