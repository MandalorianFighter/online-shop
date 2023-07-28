@extends('layouts.app')

@section('content')
@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
@endpush

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cart_container">
						<div class="cart_title">{{ __('Your Wishlist Products') }}</div>
						<div class="cart_items">
							<ul class="cart_list">

                            @forelse($wishProducts as $item)
								
								<li class="cart_item clearfix wish-form">
									{{ Form::hidden('wish_id', $item->id, ['class' => 'wish_id']) }}
									<div class="cart_item_image"><img src="{{ $item->product->getFirstMediaUrl('products/imageOne', 'thumb') }}" alt=""></div>
									<div class="cart_item_info row justify-content-start">
										<div class="cart_item_name cart_info_col col-4">
											<div class="cart_item_title">{{ __('Name') }}</div>
											<div class="cart_item_text">{{ $item->product->product_name }}</div>
										</div>
				
										<div class="cart_item_price cart_info_col col-3">
											<div class="cart_item_title">{{ __('Price') }}</div>
											<div class="cart_item_text">${{ $item->product->discount_price ? $item->product->discount_price : $item->product->selling_price }}</div>
										</div>
										
                                        <div class="cart_item_total cart_info_col col-4">
											<div class="cart_item_title">{{ __('Action') }}</div>
											<div class="cart_item_text cart_item_delete">
                                                {{ Form::button(__('Add to Cart'), ['class' => 'btn btn-success btn-sm btn-block qty-change', 'id' => $item->product->id, 'data-bs-toggle' => 'modal', 'data-bs-target' => '#cartModal', 'onclick' => 'productView(this.id)']) }}
                                                <button class="btn btn-sm btn-danger delete-wish-item">X</button>
                                            </div>
										</div>
										
									</div>
								</li>
							@empty
							<li class="cart_item clearfix wish-form"><b class="order_total_title">{{ __('No items have been added to the wishlist yet') }}.</b></li>
							@endforelse
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


	@push('scripts')
    <script type="module" src="{{ asset('frontend/js/cart_custom.js') }}"></script>
	@endpush
@endsection