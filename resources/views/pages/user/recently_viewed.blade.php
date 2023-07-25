<!-- Recently Viewed -->

<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">{{ __('Recently Viewed') }}</h3>
                        @if($recentlyViewed->count() > 5)
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
						@endif
					</div>
                        @if($recentlyViewed->isEmpty())
                            <p>{{ __('No recently viewed products.') }}</p>
                        @else
					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">

                        
							
                        @foreach($recentlyViewed as $item)
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item {{ $item->discount_price ? 'discount' : 'is_new' }} d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="{{ $item->getFirstMediaUrl('products/imageOne', 'thumb-mid') }}" alt="" ></div>
									<div class="viewed_content text-center">
                                        @if(!$item->discount_price) 
                                        <div class="viewed_price">${{ $item->selling_price }}</div>
                                        @else
                                        <div class="viewed_price discount">${{ $item->discount_price }}<span>${{ $item->selling_price }}</span></div>
                                        @endif
										<div class="viewed_name"><a href="{{ route('product.details', $item) }}" title="{{ $item->product_name }}">{{ $item->limitName() }}</a></div>
									</div>
									<ul class="item_marks">
                                        @if(!$item->discount_price) 
                                        <li class="item_mark item_new">new</li>
                                        @else
                                        <li class="item_mark item_discount">-{{ $item->getDiscount() }}%</li>
                                        @endif
									</ul>
								</div>
							</div>
                        @endforeach
							
						</div>

					</div>
                    @endif
				</div>
			</div>
		</div>
	</div>