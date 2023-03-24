@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">


	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{ $product->getFirstMediaUrl('products/imageOne') }}"><img src="{{ $product->getFirstMediaUrl('products/imageOne') }}" alt=""></li>
						<li data-image="{{ $product->getFirstMediaUrl('products/imageTwo') }}"><img src="{{ $product->getFirstMediaUrl('products/imageTwo') }}" alt=""></li>
						<li data-image="{{ $product->getFirstMediaUrl('products/imageThree') }}"><img src="{{ $product->getFirstMediaUrl('products/imageThree') }}" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ $product->getFirstMediaUrl('products/imageOne', 'thumb-mid') }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $product->category->category_name }} > {{ $product->subcategory->subcategory_name ?? $product->brand->brand_name }}</div>
						<div class="product_name">{{ $product->product_name }}</div>
						
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>
                            {!! $product->product_details !!}
                        </p></div>
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
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">{{ __('Product Details') }}</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">{{ __('Product Details') }}</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">{{ __('Video Link') }}</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">{{ __('Product Review') }}</button>
					</li>
					</ul>
					<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0"><br>{!! $product->product_details !!}</div>
					<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0"><br>{{ $product->video_link }}</div>
					<div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0"><br>Product Review</div>
					</div>


				</div>
			</div>
		</div>
	</div>
    


@endsection
