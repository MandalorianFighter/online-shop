@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/checkout.css') }}">
@endpush



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

                        <hr>

						<ul class="list-group col-lg-8 float-end mt-1">
							@if(Session::has('coupon'))
							<li class="list-group-item">{{ __('Subtotal') }}: <span class="float-end subtotal-sp">${{ Cart::subtotal() }}</span></li>
							<li class="list-group-item">{{ __('Coupon') }}: ({{ Session::get('coupon')['name'] }}) <span class="float-end">- ${{ Session::get('coupon')['discount'] }}</span></li>
							@else
							<li class="list-group-item">{{ __('Subtotal') }}: <span class="float-end subtotal-sp">${{ Cart::subtotal() }}</span></li>
							@endif
							<li class="list-group-item">{{ __('Shipping Charge') }}: <span class="float-end charge-sp">${{ $settings->shipping_charge }}</span></li>
							<li class="list-group-item">{{ __('VAT') }}: <span class="float-end vat-sp">${{ $settings->vat }}</span></li>
							
							<li class="list-group-item">{{ __('Total') }}: <span class="float-end total-sp">${{ Cart::subtotal() == 0 ? '0.00' : $total }}</span></li>
						</ul>
                        
					</div>
				</div>

                <div class="col-lg-5 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">{{ __('Payment') }}</div>

            <form id="payment-form" method="POST" action="{{ route('oncash.charge') }}">
              @csrf
              <div class="mb-3" id="card-element">
                <h5>Cash On Delivery</h5>
              </div>

              <!-- We'll put the error messages in this element -->
              <div id="card-errors" role="alert"></div>

              <input type="hidden" name="total" value="{{ $total }}">
              <input type="hidden" name="payment_type" value="{{ $payment_type }}">

              <button id="card-button" class="btn btn-dark">{{ __('Submit Order') }}</button>
            </form>

					</div>
				</div>
			</div>
		</div>
	</div>

    
@endsection