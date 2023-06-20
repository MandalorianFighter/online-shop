@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">


        <div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">{{ __('Cart Products') }}</div>

                        <div class="cart_items">
							<ul class="cart_list">

                            @foreach($cart as $item)
								
								<li class="cart_item clearfix check-form">							

									<div class="cart_item_info d-flex flex-md-row justify-content-between mt-1 mb-1">

									<div class="cart_item_image cart_info_col col-2">
										<!-- <div class="cart_item_title">{{ __('Image') }}</div> -->
										<div class="cart_item_text"><img src="{{ asset($item->options->image) }}" alt="" style="max-height: 100px;"></div>
									</div>


										<div class="cart_item_name cart_info_col col-2">
											<div class="cart_item_title"><b>{{ __('Name') }}</b></div>
											<div class="cart_item_text">{{ $item->name }}</div>
										</div>
									
                                        @if($item->options->color)
										<div class="cart_item_color cart_info_col col-2">
											<div class="cart_item_title"><b>{{ __('Color') }}</b></div>
											<div class="cart_item_text">{{ $item->options->color }}</div>
										</div>
                                        @endif
                                        @if($item->options->size)
                                        <div class="cart_item_color cart_info_col col-1">
											<div class="cart_item_title"><b>{{ __('Size') }}</b></div>
											<div class="cart_item_text">{{ $item->options->size }}</div>
										</div>
                                        @endif
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title"><b>{{ __('Quantity') }}</b></div>
											<div class="cart_item_text">{{ $item->qty }}</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title"><b>{{ __('Price') }}</b></div>
											<div class="cart_item_text">${{ $item->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title"><b>{{ __('Total') }}</b></div>
											<div class="cart_item_text item_total">${{ $item->price*$item->qty }}</div>
										</div>
										
									</div>
								</li>
								
                            @endforeach
							</ul>
						</div>

						<ul class="list-group col-lg-8 float-end mt-1">
							@if(Session::has('coupon'))
							<li class="list-group-item">{{ __('Subtotal') }}: <span class="float-end subtotal-sp">${{ Session::get('coupon')['balance']}}</span></li>
							<li class="list-group-item">{{ __('Coupon') }}: ({{ Session::get('coupon')['name'] }}) <a href="{{ route('remove.coupon') }}" class="btn btn-danger btn-sm">X</a><span class="float-end">${{ Session::get('coupon')['discount'] }}</span></li>
							@else
							<li class="list-group-item">{{ __('Subtotal') }}: <span class="float-end subtotal-sp">${{ Cart::subtotal() }}</span></li>
							@endif
							<li class="list-group-item">{{ __('Shipping Charge') }}: <span class="float-end charge-sp">${{ $settings->shipping_charge }}</span></li>
							<li class="list-group-item">{{ __('VAT') }}: <span class="float-end vat-sp">${{ $settings->vat }}</span></li>
							@if(Session::has('coupon'))
							<li class="list-group-item">{{ __('Total') }}: <span class="float-end total-sp">${{ Session::get('coupon')['balance'] + $settings->shipping_charge + $settings->vat }}</span></li>
							@else
							<li class="list-group-item">{{ __('Total') }}: <span class="float-end total-sp">${{ Cart::subtotal() == 0 ? '0.00' : Cart::subtotal() + $settings->shipping_charge + $settings->vat }}</span></li>
							@endif
						</ul>
                        
					</div>
				</div>

                <div class="col-lg-5 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">{{ __('Shipping Address') }}</div>

                        {{ Form::open(['route' => 'user.payment.process', 'id' => 'contact_form']) }}
                        <div class="mb-3">
                            {{ Form::label('name', __('Full Name'), ['class' => 'form-label']) }}
                            {{ Form::text('name', old('name'), ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Full Name'), 'required']) }}
                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

						<div class="mb-3">
                            {{ Form::label('phone', __('Phone'), ['class' => 'form-label']) }}
                            {{ Form::text('phone', old('phone'), ['class' => 'form-control'. ($errors->has('phone') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Phone'), 'required']) }}
                        @error('phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

						<div class="mb-3">
                            {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                            {{ Form::email('email', old('email'), ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Email'), 'required']) }}
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

						<div class="mb-3">
                            {{ Form::label('address', __('Address'), ['class' => 'form-label']) }}
                            {{ Form::text('address', old('address'), ['class' => 'form-control'. ($errors->has('address') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Address'), 'required']) }}
                        @error('address')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

						<div class="mb-3">
                            {{ Form::label('city', __('City'), ['class' => 'form-label']) }}
                            {{ Form::text('city', old('city'), ['class' => 'form-control'. ($errors->has('city') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your City'), 'required']) }}
                        @error('city')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

						<div class="contact_form_title text_center">{{__('Payment By:')}}</div>
						<div class="form-group">
							<ul class="logos_list">
								<li><input type="radio" name="payment" value="stripe"><img src="{{ asset('frontend/images/mastercard.png') }}" alt="" style="max-height: 80px;"></li>
								<li><input type="radio" name="payment" value="paypal"><img src="{{ asset('frontend/images/paypal.png') }}" alt="" style="max-height: 80px;"></li>
								<li><input type="radio" name="payment" value="ideal"><img src="{{ asset('frontend/images/ideal.png') }}" alt="" style="max-height: 80px;"></li>
							</ul>
						</div>

                        
                        <hr>
                        <div class="contact_form_button d-flex justify-content-center">
                            {{ Form::submit(__('Pay Now'), ['class' => 'btn btn-primary']) }}
                        </div>
						{{ Form::close() }}

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>
@endsection