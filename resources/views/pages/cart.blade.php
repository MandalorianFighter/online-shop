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
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">

                            @foreach($cart as $item)
								
								<li class="cart_item clearfix cart-form">
									{{ Form::hidden('prod_id', $item->rowId, ['class' => 'prod_id']) }}
									<div class="cart_item_image"><img src="{{ asset($item->options->image) }}" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $item->name }}</div>
										</div>
									
                                        @if($item->options->color)
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $item->options->color }}</div>
										</div>
                                        @endif
                                        @if($item->options->size)
                                        <div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{ $item->options->size }}</div>
										</div>
                                        @endif
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text">
                                            {{ Form::number('qty', $item->qty, ['min' => 1, 'max' => 19, 'class' => 'form-control item-qty']) }}
											</div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{ $item->price }}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text item_total">${{ $item->price*$item->qty }}</div>
										</div>
                                        <div class="cart_item_total cart_info_col">
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
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<div class="order_total_amount">${{ Cart::total() }}</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Cancel All</button>
							<button type="button" class="button cart_button_checkout">Checkout</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
@endsection