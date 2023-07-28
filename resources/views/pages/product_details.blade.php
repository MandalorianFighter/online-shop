@extends('layouts.app')

@section('content')
@push('styles')
	<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=64a7ab13df473b0019d1b1b4&product=inline-share-buttons' async='async'></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">
@endpush

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				
				<div class="col-lg-2 order-lg-1 order-3">
					<ul class="image_list">
						<li data-image="{{ $product->getFirstMediaUrl('products/imageOne') }}"><img src="{{ $product->getFirstMediaUrl('products/imageOne') }}" alt=""></li>
						<li data-image="{{ $product->getFirstMediaUrl('products/imageTwo') }}"><img src="{{ $product->getFirstMediaUrl('products/imageTwo') }}" alt=""></li>
						<li data-image="{{ $product->getFirstMediaUrl('products/imageThree') }}"><img src="{{ $product->getFirstMediaUrl('products/imageThree') }}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-2">
					<div class="image_selected"><img src="{{ $product->getFirstMediaUrl('products/imageOne', 'thumb-mid') }}" alt=""></div>
					
				</div>
				
				
				<!-- Description -->
				<div class="col-lg-5 order-4">
					<div class="product_description">
						<div class="product_category"><a href="{{ route('category.products', $product->category) }}">{{ $product->category->category_name }}</a> > {{ $product->brand->brand_name ?? $product->subcategory->subcategory_name }}</div>
						<div class="product_name">{{ $product->product_name }}</div>
						
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>

						<div class="product_text" id="product_details">
							<p>
							{!! substr($product->product_details, 0, 750) !!} <!-- Show the first 100 characters of the description -->
								<span id="more" style="display: none;">
								{!! substr($product->product_details, 750) !!} <!-- Show the remaining characters of the description -->
								</span>
							</p>
							@if(strlen($product->product_details) > 750) <!-- Only show the "Show more" button if the description is longer than 100 characters -->
								<button class="btn btn-light" id="show-more-button">Show more</button>
								<button class="btn btn-light" id="show-less-button" style="display: none;">Show less</button>
							@endif
						</div>



						<!-- <button class="btn btn-light" id="show-more-button">Show More</button> -->
						<div class="order_info d-flex flex-row">
                        
						{{ Form::model($product, ['route' => ['product.add-cart', $product]]) }}
									<div class="row">
                                        @if($product->color)
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                            {{ Form::label('color', __('Color'), ['class' => 'form-control-label']) }}
                                            {{ Form::select('color', $product_colors, null, ['class' => 'form-select input-lg', 'placeholder' => __('Pick a color'), 'required']) }}
                                            </div>
                                        </div>
                                        @endif
                                        @if($product->size)
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                            {{ Form::label('size', __('Size'), ['class' => 'form-control-label']) }}
                                            {{ Form::select('size', $product_sizes, null, ['class' => 'form-select input-lg', 'placeholder' => __('Pick a size'), 'required']) }}
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                            {{ Form::label('qty', __('Quantity'), ['class' => 'form-control-label']) }}
                                            {{ Form::number('qty', 1, ['class' => 'form-control', 'autocomplete' => false, 'min' => '1', 'max' => '9']) }}
                                            </div>
                                        </div>
										
					
				
                                    </div>

								

                                @if(!$product->discount_price) 
                                <div class="product_price">${{ $product->selling_price }}</div>
                                @else
                                <div class="product_price discoun">${{ $product->discount_price }}<span>${{ $product->selling_price }}</span></div>
                                @endif
								<div class="button_container">
										{{ Form::submit(__('Add to Cart'), ['class' => 'button cart_button']) }}
										<a id="wishlist" data-id="{{ $product->id }}">
											<div id="product_fav"><i class="fas fa-heart"></i></div>
										</a>
								</div>
                        {{ Form::close() }}
						</div>
					</div>
				</div>
                </div>
				<br>
				<div class="col-lg-7 mt-3">
					<div class="sharethis-inline-share-buttons"></div>
				</div>
			</div>
		</div>
		
	</div>

	<!-- Recently Viewed -->

	@include('pages.user.recently_viewed')

	<div class="container">
	<div class="fb-comments" data-href="{{ Request::url() }}" data-width="100%" data-numposts="5"></div>
	<div/>
    
<!-- Facebook Comments -->
<div id="fb-root"></div>

@push('scripts')
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0" nonce="av0L7TL5"></script>
<script type="module">
  const container = document.getElementById("product-details");
  const button = document.getElementById("show-more-button");

  if(button) {
	button.addEventListener("click", function () {
    if (container.style.overflow === "hidden") {
      container.style.overflow = "visible";
      button.textContent = "Show Less";
    } else {
      container.style.overflow = "hidden";
      button.textContent = "Show More";
    }
  });
  }
</script>
@endpush
@endsection
