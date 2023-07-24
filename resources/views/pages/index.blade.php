@extends('layouts.app')

@section('content')

<!-- Banner -->

<div class="banner">
		<div class="banner_background" style="background-image:url({{ asset('frontend/images/banner_background.jpg') }})"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="{{ $slider->getFirstMediaUrl('products/imageOne') }}" class="main_banner float-end" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">{{ $slider->product_name }}</h1>
						<div class="banner_price">
							@if(!$slider->discount_price) 
							${{ $slider->selling_price }}
							@else
						<span>${{ $slider->selling_price }}</span>${{ $slider->discount_price }}
							@endif
						</div>
						<div class="banner_product_name">{{ $slider->brand->brand_name }}</div>
						<div class="button banner_button"><a href="{{ route('product.details', $slider) }}">{{ __('Shop Now') }}</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend/images/char_1.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">{{ __('Free Delivery') }}</div>
							<div class="char_subtitle">{{ __('from $50') }}</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend/images/char_2.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">{{ __('Free Delivery') }}</div>
							<div class="char_subtitle">{{ __('from $50') }}</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend/images/char_3.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">{{ __('Free Delivery') }}</div>
							<div class="char_subtitle">{{ __('from $50') }}</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="{{ asset('frontend/images/char_4.png') }}" alt=""></div>
						<div class="char_content">
							<div class="char_title">{{ __('Free Delivery') }}</div>
							<div class="char_subtitle">{{ __('from $50') }}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">{{ __('Deals of the Week') }}</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								
								<!-- Deals Item -->
								@foreach($hot as $item)
								<div class="owl-item deals_item">
									<div class="deals_image"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb-mid') }}" alt="" ></div>
									<div class="deals_content">
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_category"><a href="#">{{ $item->category->category_name }}</a></div>
											<div class="deals_item_price_a ms-auto">${{ $item->selling_price }}</div>
										</div>
										<div class="deals_info_line d-flex flex-row justify-content-start">
											<div class="deals_item_name" title="{{ $item->product_name }}">{{ $item->limitName() }}</div>
											@if($item->discount_price)
											<div class="deals_item_price ms-auto">${{ $item->discount_price }}</div>
											@endif
										</div>
										<div class="available">
											<div class="available_line d-flex flex-row justify-content-start">
												<div class="available_title">{{ __('Available: ') }}<span>{{ $item->quantity }}</span></div>
												<div class="sold_title ms-auto">{{ __('Already sold: ') }}<span>28</span></div>
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
											<div class="deals_timer_title_container">
												<div class="deals_timer_title">{{ __('Hurry Up') }}</div>
												<div class="deals_timer_subtitle">{{ __('Offer ends in:') }}</div>
											</div>
											<div class="deals_timer_content ms-auto">
												<div class="deals_timer_box clearfix" data-target-time="">
													<div class="deals_timer_unit">
														<div id="deals_timer1_hr" class="deals_timer_hr"></div>
														<span>{{ __('hours') }}</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_min" class="deals_timer_min"></div>
														<span>{{ __('mins') }}</span>
													</div>
													<div class="deals_timer_unit">
														<div id="deals_timer1_sec" class="deals_timer_sec"></div>
														<span>{{ __('secs') }}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ms-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ms-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">{{ __('Featured') }}</li>
									<li>{{ __('Trend') }}</li>
									<li>{{ __('Best Rated') }}</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($featured as $item)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item {{ $item->discount_price ? 'discount' : 'is_new' }} d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb') }}" }}" alt=""></div>
											<div class="product_content">
												@if(!$item->discount_price) 
												<div class="product_price">${{ $item->selling_price }}</div>
												@else
												<div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
												@endif
												<div class="product_name"><div><a href="{{ route('product.details', $item) }}" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div></div>

												<div class="product_extras">
													<div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div>
													<button class="product_cart_button add-cart" id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="productView(this.id)">{{ __('Add to Cart') }}</button>
												</div>
											</div>
											
											<a id="wishlist" data-id="{{ $item->id }}">
												<div class="product_fav"><i class="fas fa-heart"></i></div>
											</a>
											
											<ul class="product_marks">
												@if(!$item->discount_price) 
												<li class="product_mark product_new">new</li>
												@else
												<li class="product_mark product_discount">-{{ $item->getDiscount() }}%</li>
												@endif
											</ul>
										</div>
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($trend as $item)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item {{ $item->discount_price ? 'discount' : 'is_new' }} d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb') }}" }}" alt=""></div>
											<div class="product_content">
												@if(!$item->discount_price) 
												<div class="product_price">${{ $item->selling_price }}</div>
												@else
												<div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
												@endif
												<div class="product_name"><div><a href="{{ route('product.details', $item) }}" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div></div>
												<div class="product_extras">
													<div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div>
													<button class="product_cart_button add-cart" id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="productView(this.id)">{{ __('Add to Cart') }}</button>
												</div>
											</div>
											<a id="wishlist" data-id="{{ $item->id }}">
												<div class="product_fav"><i class="fas fa-heart"></i></div>
											</a>
											<ul class="product_marks">
												@if(!$item->discount_price) 
												<li class="product_mark product_new">new</li>
												@else
												<li class="product_mark product_discount">-{{ $item->getDiscount() }}%</li>
												@endif
											</ul>
										</div>
									</div>
								@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									@foreach($best as $item)
									<div class="featured_slider_item">
										<div class="border_active"></div>
										<div class="product_item {{ $item->discount_price ? 'discount' : 'is_new' }} d-flex flex-column align-items-center justify-content-center text-center">
											<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb') }}" }}" alt=""></div>
											<div class="product_content">
												@if(!$item->discount_price) 
												<div class="product_price">${{ $item->selling_price }}</div>
												@else
												<div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
												@endif
												<div class="product_name"><div><a href="{{ route('product.details', $item) }}" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div></div>
												<div class="product_extras">
													<div class="product_color">
														<input type="radio" checked name="product_color" style="background:#b19c83">
														<input type="radio" name="product_color" style="background:#000000">
														<input type="radio" name="product_color" style="background:#999999">
													</div>
													<button class="product_cart_button add-cart" id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="productView(this.id)">{{ __('Add to Cart') }}</button>
												</div>
											</div>
											<a id="wishlist" data-id="{{ $item->id }}">
												<div class="product_fav"><i class="fas fa-heart"></i></div>
											</a>
											<ul class="product_marks">
												@if(!$item->discount_price) 
												<li class="product_mark product_new">new</li>
												@else
												<li class="product_mark product_discount">-{{ $item->getDiscount() }}%</li>
												@endif
											</ul>
										</div>
									</div>
									@endforeach
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">{{ __('Popular Categories') }}</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ms-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ms-auto"></i></div>
						</div>
						<div class="popular_categories_link"><a href="#">{{ __('full catalog') }}</a></div>
					</div>
				</div>
				
				<!-- Popular Categories Slider -->
				

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
				@foreach($categories as $category)
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="{{ $category->getFirstMediaUrl('categories') }}" alt="{{ $category->category_name }} logo" height="70em" max-width="100%"></div>
									<div class="popular_category_text">{{ $category->category_name }}</div>
								</div>
							</div>
				@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				@foreach($midSlider as $item)
				<div class="owl-item">
					<div class="banner_2_item">
						<div class="container fill_height">
							<div class="row fill_height">
								<div class="col-lg-4 col-md-6 fill_height">
									<div class="banner_2_content">
										<div class="banner_2_category"><h4>{{ $item->category->category_name }}</h4></div>
										<div class="banner_2_title">{{ $item->product_name }}</div>
										<div class="banner_2_text"><h4>{{ $item->brand->brand_name }}</h4> <h2>${{ $item->selling_price }}</h2></div>
										<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
										<div class="button banner_2_button"><a href="{{ route('product.details', $item) }}">{{ __('Explore') }}</a></div>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-6 fill_height">
									<div class="banner_2_image_container">
										<div class="banner_2_image"><img src="{{ $item->getFirstMediaUrl('products/imageOne') }}" class="banner_2_img float-end" alt=""></div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>

	<!-- Hot New Category One -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">{{ __('Hot New Arrivals') }}</div>
							<ul class="clearfix">
								<li class="active">{{ $firstCategory->category_name }}</li>
								<li>{{ $secondCategory->category_name }}</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach($fCproducts as $item)
											<div class="featured_slider_item">
												<div class="border_active"></div>
												<div class="product_item {{ $item->discount_price ? 'discount' : 'is_new' }} d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb') }}" }}" alt=""></div>
													<div class="product_content">
														@if(!$item->discount_price) 
														<div class="product_price">${{ $item->selling_price }}</div>
														@else
														<div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
														@endif
														<div class="product_name"><div><a href="{{ route('product.details', $item) }}" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
															<button class="product_cart_button add-cart" id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="productView(this.id)">{{ __('Add to Cart') }}</button>
														</div>
													</div>
													
													<a id="wishlist" data-id="{{ $item->id }}">
														<div class="product_fav"><i class="fas fa-heart"></i></div>
													</a>
													
													<ul class="product_marks">
														@if(!$item->discount_price) 
														<li class="product_mark product_new">new</li>
														@else
														<li class="product_mark product_discount">-{{ $item->getDiscount() }}%</li>
														@endif
													</ul>
												</div>
											</div>
											@endforeach
										</div>
										<div class="featured_slider_dots_cover"></div>
									</div>


    <!-- Hot New Category Two -->

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										@foreach($sCproducts as $item)
											<div class="featured_slider_item">
												<div class="border_active"></div>
												<div class="product_item {{ $item->discount_price ? 'discount' : 'is_new' }} d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb') }}" }}" alt=""></div>
													<div class="product_content">
														@if(!$item->discount_price) 
														<div class="product_price">${{ $item->selling_price }}</div>
														@else
														<div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
														@endif
														<div class="product_name"><div><a href="{{ route('product.details', $item) }}" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
															<button class="product_cart_button add-cart" id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#cartModal" onclick="productView(this.id)">{{ __('Add to Cart') }}</button>
														</div>
													</div>
													
													<a id="wishlist" data-id="{{ $item->id }}">
														<div class="product_fav"><i class="fas fa-heart"></i></div>
													</a>
													
													<ul class="product_marks">
														@if(!$item->discount_price) 
														<li class="product_mark product_new">new</li>
														@else
														<li class="product_mark product_discount">-{{ $item->getDiscount() }}%</li>
														@endif
													</ul>
												</div>
											</div>
											@endforeach
										</div>
										<div class="featured_slider_dots_cover"></div>
									</div>


							</div>

							

						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url({{ asset('frontend/images/trends_background.jpg') }})"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">{{__('BuyOne & GetOne')}}</h2>
						<div class="trends_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ms-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ms-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">

						@foreach($buyGet as $item)
							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb-mid') }}" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">{{ $item->brand->brand_name }}</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="{{ route('product.details', $item) }}" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div>
											@if(!$item->discount_price) 
											<div class="product_price">${{ $item->selling_price }}</div>
											@else
											<div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
											@endif
											
										</div>
									</div>
									<ul class="trends_marks">
										@if(!$item->discount_price) 
										<li class="trends_mark trends_new">BuyGet</li>
										@endif
									</ul>
									<a id="wishlist" data-id="{{ $item->id }}">
										<div class="trends_fav"><i class="fas fa-heart"></i></div>
									</a>
								</div>
							</div>
						@endforeach
							

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">{{ __('Latest Blog Posts') }}</h3>
						<div class="reviews_all ms-auto"><a href="{{ route('blog.post') }}">{{ __('view all') }} <span>{{ __('Blog Posts') }}</span></a></div>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							
						@forelse($posts as $post)
							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									
									<div><div class="review_image"><img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="{{ $post->title }} image" height="70em" max-width="100%"></div></div>
									<div class="review_content">
										<div class="review_name">{{ $post->title }}</div>
										<!-- <div class="review_rating_container">
											<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="review_time">2 day ago</div>
										</div> -->
										<div class="review_text"><p>{!! Str::limit($post->full_text) !!}</p></div>
									</div>
								</div>
							</div>
						@empty
						<h5>No Blog Posts Found.</h5>
						@endforelse

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- recently viewed -->

	@include('pages.user.recently_viewed')

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							@forelse($brands as $brand)
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="{{ $brand->getFirstMediaUrl('brands') }}" alt="{{ $brand->brand_name }} logo" height="70em" max-width="100%"></div></div>
							@empty
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center">No Brands Found.</div></div>
							@endforelse
						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png') }}" alt=""></div>
							<div class="newsletter_title">{{ __('Sign up for Newsletter') }}</div>
							<div class="newsletter_text"><p>{{ __('...and receive %20 coupon for first shopping.') }}</p></div>
						</div>
						<div class="newsletter_content clearfix">
							{{ Form::open(['route' => 'newsletters.store', 'class' => 'newsletter_form']) }}
							{{ Form::email('email', null, ['class' => 'newsletter_input', 'required', 'placeholder' => __('Enter your email address')]) }}
							{{ Form::submit(__('Subscribe'), ['class' => 'newsletter_button']) }}
							{{ Form::close() }}
							<div class="newsletter_unsubscribe_link"><a href="#">{{ __('unsubscribe') }}</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cartModalLabel">{{ __('Product Quick View') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">

			<div class="col-md-4">
				<div class="card">
					<img src="" alt="" id="pImage">
					<div class="card-body">
						<h5 class="card-title text-center" id="pName">{{ __('Product Name') }}</h5>

					</div>
				</div>
			</div>

			<div class="col-md-4">
				<ul class="list-group">
					<li class="list-group-item py-3">{{ __('Product Code') }}: <span id="pCode"></span></li>
					<li class="list-group-item py-3">{{ __('Category') }}: <span id="pCat"></span></li>
					<li class="list-group-item py-3">{{ __('Subcategory') }}: <span id="pSub"></span></li>
					<li class="list-group-item py-3">{{ __('Brand') }}: <span id="pBrand"></span></li>
					<li class="list-group-item py-3">{{ __('Stock') }}: <span class="badge text-bg-success">{{ __('Available') }}</span></li>
				</ul>
			</div>
			@isset($item)
			<div class="col-md-4">
			{{ Form::open(['route' => 'cart-product.add']) }}
			{{ Form::hidden('prod_id', $item->rowId, ['id' => 'prod_id']) }}
				<div class="mb-3 py-2">
					{{ Form::label('color', __('Color'), ['class' => 'form-control-label']) }}
					{{ Form::select('color', [], null, ['class' => 'form-control', 'id' => 'color']) }}
				</div>

				<div class="mb-3 py-2">
					{{ Form::label('size', __('Size'), ['class' => 'form-control-label']) }}
					{{ Form::select('size', [], null, ['class' => 'form-control', 'id' => 'size']) }}
				</div>

				<div class="mb-3 py-2">
					{{ Form::label('qty', __('Quantity'), ['class' => 'form-control-label']) }}
					{{ Form::number('qty', 1, ['class' => 'form-control', 'id' => 'qty', 'min' => 1]) }}
				</div>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				{{ Form::submit(__('Add to Cart'), ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}
			</div>
			@endisset
		</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

@endsection
	