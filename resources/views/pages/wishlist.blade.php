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
						<div class="cart_title">Your Wishlist Products</div>
						<div class="cart_items">
							<ul class="cart_list">

                            @foreach($wishProducts as $item)
								
								<li class="cart_item clearfix cart-form">
									{{ Form::hidden('prod_id', $item->rowId, ['class' => 'prod_id']) }}
									<div class="cart_item_image"><img src="{{ $item->product->getFirstMediaUrl('products/imageOne', 'thumb') }}" alt=""></div>
									<div class="cart_item_info row justify-content-start">
										<div class="cart_item_name cart_info_col col-4">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{ $item->product->product_name }}</div>
										</div>
									
                                        <!-- @if($item->product->color)
										<div class="cart_item_color cart_info_col col-3">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text">{{ $item->product->color }}</div>
										</div>
                                        @endif
                                        @if($item->product->size)
                                        <div class="cart_item_color cart_info_col col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{ $item->product->size }}</div>
										</div>
                                        @endif -->
				
										<div class="cart_item_price cart_info_col col-3">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{ $item->product->discount_price ? $item->product->discount_price : $item->product->selling_price }}</div>
										</div>
										
                                        <div class="cart_item_total cart_info_col col-4">
											<div class="cart_item_title">Action</div>
											<div class="cart_item_text cart_item_delete">
                                                {{ Form::button('Add to Cart', ['class' => 'btn btn-success btn-sm btn-block qty-change']) }}
                                                <button class="btn btn-sm btn-danger delete-cart-item">X</button>
                                            </div>
										</div>
										
									</div>
								</li>
								
                            @endforeach
							</ul>
                        
						</div>
						
						
					</div>
                    
				</div>
			</div>
		</div>
		
	</div>
	<div class="pagination justify-content-center">
	{{ $wishProducts->links() }}
	</div>
	
	
	

<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
@endsection