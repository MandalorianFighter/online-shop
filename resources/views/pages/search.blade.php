@extends('layouts.app')

@section('content')
@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css') }}">
@endpush

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Search Product</h2>
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
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
                                @forelse($categories as $category)
								<li><a href="{{ route('category.products', $category) }}">{{ $category->category_name }}</a></li>
                                @empty
								<li>No Categories found</li>
                                @endforelse
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
                                @forelse($brands as $brand)
								<li class="brand"><a href="#">{{ $brand->brand_name }}</a></li>
                                @empty
								<li class="brand">No Brands found</li>
                                @endforelse
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{ $products->count() }}</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
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
								<div class="product_fav"><i class="fas fa-heart"></i></div>
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
                            <h3 class="mt-3">No items found.</h3>    
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

@endsection