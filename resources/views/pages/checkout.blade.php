@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">{{ __('Checkout') }}</div>
						<div class="cart_items">
							<ul class="cart_list">

                            @foreach($cart as $item)
								
								<li class="cart_item clearfix check-form">
									{{ Form::hidden('prod_id', $item->rowId, ['class' => 'prod_id']) }}
									<div class="cart_item_image"><img src="{{ asset($item->options->image) }}" alt=""></div>
									<div class="cart_item_info row justify-content-start">
										<div class="cart_item_name cart_info_col col-3">
											<div class="cart_item_title">{{ __('Name') }}</div>
											<div class="cart_item_text">{{ $item->name }}</div>
										</div>
									
                                        @if($item->options->color)
										<div class="cart_item_color cart_info_col col-2">
											<div class="cart_item_title">{{ __('Color') }}</div>
											<div class="cart_item_text">{{ $item->options->color }}</div>
										</div>
                                        @endif
                                        @if($item->options->size)
                                        <div class="cart_item_color cart_info_col col">
											<div class="cart_item_title">{{ __('Size') }}</div>
											<div class="cart_item_text">{{ $item->options->size }}</div>
										</div>
                                        @endif
										<div class="cart_item_color cart_info_col col">
											<div class="cart_item_title">{{ __('Quantity') }}</div>
											<div class="cart_item_text">
                                            {{ Form::number('qty', $item->qty, ['min' => 1, 'max' => 19, 'class' => 'form-control item-qty']) }}
											</div>
										</div>
										<div class="cart_item_price cart_info_col col">
											<div class="cart_item_title">{{ __('Price') }}</div>
											<div class="cart_item_text">${{ $item->price }}</div>
										</div>
										<div class="cart_item_price cart_info_col col">
											<div class="cart_item_title">{{ __('Total') }}</div>
											<div class="cart_item_text item_total">${{ $item->price*$item->qty }}</div>
										</div>
                                        <div class="cart_item_price cart_info_col col">
											<div class="cart_item_title">{{ __('Action') }}</div>
											<div class="cart_item_text cart_item_delete">
                                                {!! Html::decode(Form::button('<i class="fas fa-check-square"></i>', ['class' => 'btn btn-success btn-sm btn-block qty-check'])) !!}
                                                <button class="btn btn-sm btn-danger delete-cart-check">X</button>
                                            </div>
										</div>
										
									</div>
								</li>
								
                            @endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						
							<div class="order_total_content py-3">
							@if(Session::missing('coupon'))
                                <h4 class="py-3">{{ __('Apply Coupon') }}</h4>
                            {{ Form::open(['route' => 'apply.coupon']) }}
                            <div class="mb-3 col-lg-4">
                            {{ Form::text('coupon', null, ['class' => 'form-control', 'placeholder' => __('Enter Your Coupon')]) }}
                            </div>
                            {{ Form::submit(__('Submit'), ['class' => 'btn btn-success ml-2']) }}
                            {{ Form::close() }}
							
                            </div>
							@endif
                            <div class="d-flex flex-row-reverse py-3">
                            <ul class="list-group col-lg-4">
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

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">{{ __('Cancel All') }}</button>
							<a href="{{ route('user.checkout') }}"  class="button cart_button_checkout" >{{ __('Checkout') }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
@endsection