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
						<div class="cart_title">Checkout</div>
						<div class="cart_items">
							<ul class="cart_list">

                            @foreach($cart as $item)
								
								<li class="cart_item clearfix cart-form">
									{{ Form::hidden('prod_id', $item->rowId, ['class' => 'prod_id']) }}
									<div class="cart_item_image"><img src="{{ asset($item->options->image) }}" alt=""></div>
									<div class="cart_item_info row justify-content-start">
										<div class="cart_item_name cart_info_col col-3">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $item->name }}</div>
										</div>
									
                                        @if($item->options->color)
										<div class="cart_item_color cart_info_col col-2">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $item->options->color }}</div>
										</div>
                                        @endif
                                        @if($item->options->size)
                                        <div class="cart_item_color cart_info_col col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{ $item->options->size }}</div>
										</div>
                                        @endif
										<div class="cart_item_color cart_info_col col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">
                                            {{ Form::number('qty', $item->qty, ['min' => 1, 'max' => 19, 'class' => 'form-control item-qty']) }}
											</div>
										</div>
										<div class="cart_item_price cart_info_col col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{ $item->price }}</div>
										</div>
										<div class="cart_item_price cart_info_col col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text item_total">${{ $item->price*$item->qty }}</div>
										</div>
                                        <div class="cart_item_price cart_info_col col">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text cart_item_delete">
                                                {!! Html::decode(Form::button('<i class="fas fa-check-square"></i>', ['class' => 'btn btn-success btn-sm btn-block qty-change'])) !!}
                                                <button class="btn btn-sm btn-danger delete-cart-item">X</button>
                                            </div>
										</div>
										
									</div>
								</li>
								
                            @endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
						
							<div class="order_total_content py-3">
                                <h4 class="py-3">Apply Coupon</h4>
                            {{ Form::open(['#']) }}
                            <div class="mb-3 col-lg-4">
                            {{ Form::text('coupon', null, ['class' => 'form-control', 'placeholder' => 'Enter Your Coupon']) }}
                            </div>
                            {{ Form::submit('Submit', ['class' => 'btn btn-success ml-2']) }}
                            {{ Form::close() }}
							
                            </div>
                            <div class="d-flex flex-row-reverse">
                            <ul class="list-group col-lg-4">
                                <li class="list-group-item">Subtotal: <span class="text-md-right">525</span></li>
                                <li class="list-group-item">Coupon: <span class="text-md-right">525</span></li>
                                <li class="list-group-item">Shipping Charge: <span class="text-md-right">525</span></li>
                                <li class="list-group-item">Vat: <span class="text-md-right">525</span></li>
                                <li class="list-group-item">Total: <span class="text-md-right">525</span></li>
                            </ul>
                            </div>
                            </div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Cancel All</button>
							<a href="{{ route('user.checkout') }}"  class="button cart_button_checkout" >Checkout</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
@endsection