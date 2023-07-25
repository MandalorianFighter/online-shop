@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css') }}">

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">{{ $category->category_name }}</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">{{ __('Categories') }}</div>
							<ul class="sidebar_categories">
                                @forelse($categories as $category)
								<li><a href="{{ route('category.products', $category) }}">{{ $category->category_name }}</a></li>
                                @empty
								<li>{{ __('No Categories found') }}</li>
                                @endforelse
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">{{ __('Filter By') }}</div>
							<div class="sidebar_subtitle">{{ __('Price') }}</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>{{ __('Range:') }} </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">{{ __('Brands') }}</div>
							<ul class="brands_list">
                                @forelse($brands as $brand)
								<li class="brand"><a data-slug="{{ $brand->slug }}" href="#">{{ $brand->brand_name }}</a></li>
                                @empty
								<li class="brand">{{ __('No Brands found') }}</li>
                                @endforelse
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{ $products->count() }}</span> {{ __('products found') }}</div>
							<div class="shop_sorting">
								<span>{{ __('Sort by:') }}</span>
								<ul>
									<li>
										<span class="sorting_text">{{ __('highest rated') }}<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>{{ __('highest rated') }}</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>{{ __('name') }}</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>{{ __('price') }}</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row">
							<!-- <div class="product_grid_border"></div> -->

                            @forelse($products as $item)
							<!-- Product Item -->
							<div class="product_item {{ $item->discount_price ? 'discount' : 'is_new' }}">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb') }}" alt="" style="height: 7rem;"></div>
								<div class="product_content">
									
                                    @if(!$item->discount_price) 
                                    <div class="product_price">${{ $item->selling_price }}</div>
                                    @else
                                    <div class="product_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
                                    @endif
								
									<div class="product_name"><div><a href="{{ route('product.details', $item) }}" tabindex="0" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div></div>
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
                            @empty

							<div class="d-flex justify-content-center">
                            <h3 class="mt-3">{{ __('No items found.') }}</h3>    
                            </div>
							@endforelse

						</div>

						<!-- Shop Page Navigation -->

                        {{ $products->links('pagination.category_products') }}
					</div>

				</div>
			</div>
		</div>
	</div>

	@include('pages.user.recently_viewed')
	
    <script src="{{ asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
@endsection