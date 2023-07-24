<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ $seo->page_title ?? '' }}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="{{ $seo->meta_description ?? '' }}">
<meta name="keywords" content="{{ $seo->meta_keywords ?? '' }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=64a7ab13df473b0019d1b1b4&product=inline-share-buttons' async='async'></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://www.paypal.com/sdk/js?client-id=ARGpVcHc0UGc2RUuA3QrdIFONDmDF6VkW8yId1bAJ683qj2YMv0SLTlVZO3QQ3I6fsyUSM_fgtgcyunB&currency=USD"></script>
</head>

<body>
	

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt=""></div>{{ $info->phone_one }}</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt=""></div><a href="mailto:{{ $info->company_email }}">{{ $info->company_email }}</a></div>
						<div class="top_bar_content ms-auto">

						@if(auth()->user())
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#" data-bs-toggle="modal" data-bs-target="#orderTrackingModal">{{ __('My Order Tracking') }}</a>
									</li>
								
								</ul>
							</div>
						@endif

							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="#">{{ strtoupper(app()->getLocale()) }}<i class="fas fa-chevron-down"></i></a>
										
										<ul>
											@foreach(config('translatable.locales') as $langName => $langLocale)
											<li><a href="{{ url()->current() }}?lang={{ $langLocale }}">{{ $langName }}</a></li>
											@endforeach
										</ul>
									</li>
								
								</ul>
							</div>
							<div class="top_bar_user">
							@guest
								<div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt=""></div>
								<div><a href="{{ route('login') }}">{{ __('Register/Login') }}</a></div>
							@else
							
							<ul class="standard_dropdown top_bar_dropdown">
									<li>
										<a href="{{ route('dashboard') }}"><div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt=""></div>{{ __('Profile') }}<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="{{ route('user.wishlist') }}">{{ __('Wishlist') }}</a></li>
											<li><a href="{{ route('user.checkout') }}">{{ __('Checkout') }}</a></li>
											<li><a href="{{ route('user.logout') }}">{{ __('Logout') }}</a></li>
										</ul>
									</li>
								</ul>
							@endguest

							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('frontend/images/abstract.png') }}" alt=""></a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form method="post" action="{{ route('product.search') }}" class="header_search_form clearfix" id="search_form">
										@csrf
										<input type="search" name="search" required="required" class="header_search_input" placeholder="{{ __('Search for products...') }}">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">{{ __('All Categories') }}</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													@foreach($categories as $category)
													<li><a class="clc category-link" data-slug="{{ $category->slug }}" href="#">{{ $category->category_name }}</a></li>
													@endforeach
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{ asset('frontend/images/search.png') }}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
							@guest


							@else
								<div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="{{ route('user.wishlist') }}">{{ __('Wishlist') }}</a></div>
									<div class="wishlist_count">{{ $wishlist->count() }}</div>
								</div>
							@endguest

							</div>
							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{ asset('frontend/images/cart.png') }}" alt="">
										<div class="cart_count"><span>{{ Cart::count() }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ route('cart.show') }}">{{ __('Cart') }}</a></div>
										<div class="cart_price">${{ Cart::subtotal() }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

	<!-- Characteristics -->
	@include('layouts.menu-bar')

	</header>

@yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">{{ $info->company_name }}</a></div>
						</div>
						<div class="footer_title">{{ __('Got Question? Call Us 24/7') }}</div>
						<div class="footer_phone">{{ $info->phone_two }}</div>
						<div class="footer_contact_text">
							<p class="col-lg-8">{{ $info->company_address }}</p>
							<!-- <p>{{ __('Grester London NW18JR, UK') }}</p> -->
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="{{ $info->fb }}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{ $info->twitter }}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{ $info->youtube }}"><i class="fab fa-youtube"></i></a></li>
								<li><a href="{{ $info->instagram }}"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">{{ __('Find it Fast') }}</div>
						<ul class="footer_list">
							@forelse($categories->take(7) as $item)
								@if(Request()->url() == route('category.products', $item))
								<div class="footer_subtitle mb-2 mt-2">{{ $item->category_name }}</div>
								@else
								<li><a href="{{ route('category.products', $item) }}">{{ $item->category_name }}</a></li>
								@endif
							@empty
							<div class="footer_subtitle mb-2 mt-2">{{ __('No Fast Links Found.') }}</div>
							@endforelse
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							@forelse($categories->slice(7) as $item)
								@if(Request()->url() == route('category.products', $item))
								<div class="footer_subtitle mb-2 mt-2">{{ $item->category_name }}</div>
								@else
								<li><a href="{{ route('category.products', $item) }}">{{ $item->category_name }}</a></li>
								@endif
							@empty
							<div class="footer_subtitle mb-2 mt-2">{{ __('No Fast Links Found.') }}</div>
							@endforelse
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">{{ __('Customer Care') }}</div>
						<ul class="footer_list">
							<li><a href="{{ route('dashboard') }}">{{ __('My Account') }}</a></li>
							<li><a href="{{ route('user.wishlist') }}">{{ __('Wish List') }}</a></li>
							<li class="text-secondary"><a >{{ __('Customer Services') }}</a></li>
							<li><a href="{{ route('order_list.success') }}">{{ __('Returns / Exchange') }}</a></li>
							<li class="text-secondary"><a >{{ __('FAQs') }}</a></li>
							<li class="text-secondary"><a >{{ __('Product Support') }}</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="{{ asset('frontend/images/logos_1.png') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('frontend/images/logos_2.png') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('frontend/images/logos_3.png') }}" alt=""></a></li>
								<li><a href="#"><img src="{{ asset('frontend/images/logos_4.png') }}" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Order Tracking Modal -->
<div class="modal fade" id="orderTrackingModal" tabindex="-1" aria-labelledby="orderTrackingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="orderTrackingModalLabel">Your Status Code</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.tracking') }}" method="post">
			@csrf
			<div class="modal-body">
				<label for="status_code">Status Code</label>
				<input type="text" name="status_code" id="status_code" required class="form-control" placeholder="Your Order Status Code">
			</div>
			<div class="modal-footer">
			<button class="btn btn-primary" type="submit">Track Now</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>
</div>



@stack('scripts')
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
<script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script src="{{ asset('frontend/js/shop_custom.js') }}"></script>
<script src="{{ asset('frontend/js/product_custom.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        @if(Session::has('message'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('message') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('message') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('message') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('message') }}");
                  break;
          }
        @endif
     </script> 

<script type="text/javascript">
$(document).ready(function() {
    $('#show-more-button').click(function() {
        $('#more').toggle(); // Toggle the display of the hidden portion of the description
        $('#show-more-button').hide(); // Hide the "Show more" button
        $('#show-less-button').show(); // Show the "Show less" button
    });

    $('#show-less-button').click(function() {
        $('#more').toggle(); // Toggle the display of the hidden portion of the description
        $('#show-less-button').hide(); // Hide the "Show less" button
        $('#show-more-button').show(); // Show the "Show more" button
    });
});
</script> 

<script type="text/javascript">
  $(document).on('click', '#wishlist', function(e) {
	e.preventDefault();
	var prod_id = $(this).data('id');
    $.ajax({
        type: 'POST',
        url: '{{ route('wishlist.add') }}',
        data: {
          _token: '{{ csrf_token() }}',
          id: prod_id
        },
        success: function(response){
          var data = $.parseJSON(response);
		  console.log(data);
		  if(data.type == 'success'){
			$('.wishlist_count').text(data.count);
			toastr.success(data.message);
		  } else {
			toastr.warning(data.message);
		  }
        }
    });
  });
</script>


<script type="text/javascript">
	$('.qty-change').click(function(e) {
		e.preventDefault();
		var item = $(e.target).parents('.cart-form');
		var prod_id = item.find('.prod_id').val();
		var qty = item.find('.item-qty').val();
		$.ajax({
        type: 'POST',
        url: '{{ route('cart-item.update') }}',
        data: {
          _token: '{{ csrf_token() }}',
          id: prod_id,
		  qty: qty
        },
        success: function(response){
        	var data = $.parseJSON(response);

			item.find('.item-qty').val(data.qty);
			item.find('.item_total').text('$' + data.itemTotal);
			$('.cart_count span').text(data.count);
			$('.cart_price').text('$' + data.subtotal);
			$('.order_total_amount').text('$' + data.total);
			
			toastr.success(data.message);
        }
    });
	});
</script>
<script type="text/javascript">
	$('.delete-cart-item').click(function(e) {
		e.preventDefault();
		var item = $(e.target).parents('.cart-form');
		var prod_id = item.find('.prod_id').val();
		$.ajax({
        type: 'POST',
        url: '{{ route('cart-item.delete') }}',
        data: {
          _token: '{{ csrf_token() }}',
          id: prod_id
        },
        success: function(response){
        	var data = $.parseJSON(response);
			item.remove(); // remove product item from cart

			$('.cart_count span').text(data.count);
			$('.cart_price').text('$' + data.subtotal);
			$('.order_total_amount').text('$' + data.total);
			toastr.warning(data.message);
			if(!data.count) {
				$('.cart_list').html('<li class="cart_item clearfix cart-form"><b class="order_total_title">' + data.empty + '.</b></li>');
			}
        }
    });
	});
</script>

<script type="text/javascript">
	function productView(id) {
		$.ajax({
        type: 'POST',
        url: '{{ route('cart-product.view') }}',
        data: {
          _token: '{{ csrf_token() }}',
          id: id
        },
        success: function(data){	
			$("#pName").text(data.product.product_name);
			$("#pImage").attr('src', data.imageOne);

			$("#pCode").text(data.product.code);
			$("#pCat").text(data.product.category.category_name);
			$("#pSub").text(data.product.subcategory.subcategory_name);
			$("#pBrand").text(data.product.brand.brand_name);

			$("#prod_id").val(data.product.id);

			$('#color').empty();
			$.each(data.colors, function(key, value) {
				$('#color').append(new Option(value, key));
			});

			$('#size').empty();
			$.each(data.sizes, function(key, value) {
				$('#size').append(new Option(value, key));
			});
        }
    });
	}
</script>


<script type="text/javascript">
	$('.qty-check').click(function(e) {
		e.preventDefault();
		var item = $(e.target).parents('.check-form');
		var prod_id = item.find('.prod_id').val();
		var qty = item.find('.item-qty').val();
		$.ajax({
        type: 'POST',
        url: '{{ route('check-item.update') }}',
        data: {
          _token: '{{ csrf_token() }}',
          id: prod_id,
		  qty: qty
        },
        success: function(response){
        	var data = $.parseJSON(response);

			@if(Session::missing('coupon'))
			item.find('.item-qty').val(data.qty);
			item.find('.item_total').text('$' + data.itemTotal);
			$('.cart_count span').text(data.count);
			$('.cart_price').text('$' + data.subtotal);
			$('.subtotal-sp').text('$' + data.subtotalSp);
			$('.total-sp').text('$' + data.totalSp);
			toastr.success(data.message);
			@else
			toastr.warning(data.message);
			@endif
        }
    });
	});
</script>

<script type="text/javascript">
	$('.delete-cart-check').click(function(e) {
		e.preventDefault();
		var item = $(e.target).parents('.check-form');
		var prod_id = item.find('.prod_id').val();
		$.ajax({
        type: 'POST',
        url: '{{ route('check-item.delete') }}',
        data: {
          _token: '{{ csrf_token() }}',
          id: prod_id
        },
        success: function(response){
        	var data = $.parseJSON(response);

			@if(Session::missing('coupon'))
			item.remove(); // remove product item from cart

			$('.cart_count span').text(data.count);
			$('.cart_price').text('$' + data.subtotal);
			$('.subtotal-sp').text('$' + data.subtotalSp);
			$('.total-sp').text(data.subtotal == 0 ? '$0.00' : '$' + data.totalSp);
			@endif
			toastr.warning(data.message);
			if(!data.count) {
				$('.cart_list').html('<li class="cart_item clearfix cart-form"><b class="order_total_title">' + data.empty + '.</b></li>');
			}
        }
    });
	});
</script>
<script type="text/javascript">
	$('.delete-wish-item').click(function(e) {
		e.preventDefault();
		var item = $(e.target).parents('.wish-form');
		var wish_id = item.find('.wish_id').val();
		$.ajax({
        type: 'POST',
        url: '{{ route('wish-item.delete') }}',
        data: {
          _token: '{{ csrf_token() }}',
          id: wish_id
        },
        success: function(response){
        	var data = $.parseJSON(response);
			item.remove(); // remove product item from cart

			$('.wishlist_count').text(data.count);
			toastr.warning(data.message);
			if(!data.count) {
				$('.cart_list').html('<li class="cart_item clearfix cart-form"><b class="order_total_title">' + data.empty + '.</b></li>');
			}
        }
    });
	});
</script>

<script type="text/javascript">
	$('.return-order').click(function() {
		var order_id = $(this).attr('id');
		$('#order_id').val(order_id);
    });
</script>
<script>
    $(document).ready(function() {
        $('.category-link').click(function(e) {
            e.preventDefault();
			const selectedCategory = $(e.target).data('slug');

			$('#search_form').attr('action', "{{ route('product.search') }}?category=" + encodeURIComponent(selectedCategory));
		});
	});
</script>
<script>
    $(document).ready(function() {
        $('.brand a').click(function(e) {
            e.preventDefault();
			const selectedBrand = $(e.target).data('slug');
			var currentURL = window.location.href;
			var baseURL = currentURL.split('?')[0];
			var newURL = baseURL + (baseURL.includes('?') ? '&' : '?') + 'brand=' + encodeURIComponent(selectedBrand);

		    window.location.href = newURL;
		});
	});
</script>
</body>

</html>