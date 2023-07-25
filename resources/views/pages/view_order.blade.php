@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-12 card">
                <h6 class="card-body-title mt-3 mb-3">{{ __('Order Details') }}
                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-info" style="float:right;">{{ __('Dashboard') }}</a>
                </h6>
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
                                                <span class="text-warning">{{ __('Pending') }}</span>
                                            @elseif($order->status == 1)
                                            <span class="text-info">{{ __('Payment Accepted') }}</span>
                                            @elseif($order->status == 2)
                                            <span class="text-warning">{{ __('Progress') }}</span>
                                            @elseif($order->status == 3)
                                            <span class="text-success">{{ __('Delivered') }}</span>
                                            @else
                                            <span class="text-danger">{{ __('Canceled') }}</span>
                                            @endif
                                        </th>
                                    </tr>
                                    
                                </table>
                            </div>


                        </div>
                    </div>   
                </div>

                <div class="row">
                <div class="card pd-20 pd-sm-40 col-lg-12 mt-3">
                <h6 class="card-body-title mt-3 mb-3">{{ __('Product Details') }}</h6>

                <div class="table-wrapper">
                    <table class="table display responsive nowrap">
                    <thead>
                        <tr>
                        <th class="wd-10p">{{ __('Product ID') }}</th>
                        <th class="wd-15p">{{ __('Product Name') }}</th>
                        <th class="wd-10p">{{ __('Image') }}</th>
                        <th class="wd-10p">{{ __('Color') }}</th>
                        <th class="wd-10p">{{ __('Size') }}</th>
                        <th class="wd-10p">{{ __('Quantity') }}</th>
                        <th class="wd-10p">{{ __('Unit Price') }}</th>
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
                        <td>{{ $product->single_price }} $</td>
                        <td>{{ $product->total_price }} $</td>
                        
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div><!-- table-wrapper -->
                </div><!-- card -->


                </div>
            @if($order->status == 0)
            <strong class="text-warning text-center">{{ __('This order is pending.') }}</strong>
            @elseif($order->status == 1)
            <strong class="text-info text-center">{{ __('This order is awaiting delivery confirmation.') }}</strong>
            @elseif($order->status == 2)
            <strong class="text-info text-center">{{ __('This order is delivering.') }}</strong>
            @elseif($order->status == 4)
            <strong class="text-danger text-center">{{ __('This order is not valid.') }}</strong>
            @else
            <strong class="text-success text-center">{{ __('This order is successfully delivered.') }}</strong>
            @endif
            <div/>
        </div>
    </div><!-- sl-mainpanel -->
@endsection