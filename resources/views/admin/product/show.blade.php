@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">{{ __('Product Section') }}</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('Product Details Page') }}
            <a href="{{ route('products.index') }}" class="btn btn-success btn-sm pull-right">{{ __('All Products') }}</a>
          </h6>

  
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  {{ Form::label('product_name', __('Product Name') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->product_name }}</strong></p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('code', __('Product Code') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->code }}</strong></p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('quantity', __('Product Quantity') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->quantity }}</strong></p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                {{ Form::label('category_id', __('Product Category') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->category->category_name }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                {{ Form::label('subcategory_id', __('Product SubCategory') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->subcategory ? $product->subcategory->subcategory_name : 'None' }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                {{ Form::label('brand_id', __('Product Brand') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->brand->brand_name }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('size', __('Product Size') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->size }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('color', __('Product Color') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->color }}</strong></p>
                </div>
              </div><!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('selling_price', __('Selling Price') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->selling_price }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                {{ Form::label('product_details', __('Product Details') . ': ', ['class' => 'form-control-label']) }}
                  <p>{!! $product->product_details !!}</p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                {{ Form::label('video_link', __('Video Link') . ': ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->video_link }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group row">
                {{ Form::label('image_one', __('Image One (Main Thumbnail)') . ': ', ['class' => 'form-control-label']) }}
                  <label class="custom-file">
                  <img src="{{ $product->getFirstMediaUrl('products/imageOne', 'thumb') }}" height="80em" max-width="100%">
                  </label>
                </div>
                <div>
                <img src="#" id="one" class="invisible">
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group row">
                {{ Form::label('image_two', __('Image Two') . ': ', ['class' => 'form-control-label']) }}
                  <label class="custom-file">
                  <img src="{{ $product->getFirstMediaUrl('products/imageTwo', 'thumb') }}" height="80em" max-width="100%">
                  </label>
                </div>
                <div>
                <img src="#" id="two" class="invisible">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group row">
                {{ Form::label('image_three', __('Image Three') . ': ', ['class' => 'form-control-label']) }}
                  <label class="custom-file">
                  <img src="{{ $product->getFirstMediaUrl('products/imageThree', 'thumb') }}" height="80em" max-width="100%">
                  </label>
                </div>
                <div>
                <img src="#" id="three" class="invisible">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->

            <hr>
            <div class="row">

            <div class="col-lg-4">
            <label class="">
              <div class="d-inline col-2">
              @if($product->main_slider == 1)
              <span class="badge badge-success">{{ __('Active') }}</span>
              @else
              <span class="badge badge-danger">{{ __('Inactive') }}</span>
              @endif
              </div>
              
              <span>{{ __('Main Slider') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
            <div class="d-inline col-2">
              @if($product->hot_deal == 1)
              <span class="badge badge-success">{{ __('Active') }}</span>
              @else
              <span class="badge badge-danger">{{ __('Inactive') }}</span>
              @endif
            </div>
              <span>{{ __('Hot Deal') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
            <div class="d-inline col-2">
              @if($product->best_rated == 1)
              <span class="badge badge-success">{{ __('Active') }}</span>
              @else
              <span class="badge badge-danger">{{ __('Inactive') }}</span>
              @endif
            </div>
              <span>{{ __('Best Rated') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
            <div class="d-inline col-2">
              @if($product->trend == 1)
              <span class="badge badge-success">{{ __('Active') }}</span>
              @else
              <span class="badge badge-danger">{{ __('Inactive') }}</span>
              @endif
            </div>
              <span>{{ __('Trend Product') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
            <div class="d-inline col-2">
              @if($product->mid_slider == 1)
              <span class="badge badge-success">{{ __('Active') }}</span>
              @else
              <span class="badge badge-danger">{{ __('Inactive') }}</span>
              @endif
            </div>
              <span>{{ __('Mid Slider') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
            <div class="d-inline col-2">
              @if($product->hot_new == 1)
              <span class="badge badge-success">{{ __('Active') }}</span>
              @else
              <span class="badge badge-danger">{{ __('Inactive') }}</span>
              @endif
            </div>
              <span>{{ __('Hot New') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
            <div class="d-inline col-2">
              @if($product->buyone_getone == 1)
              <span class="badge badge-success">{{ __('Active') }}</span>
              @else
              <span class="badge badge-danger">{{ __('Inactive') }}</span>
              @endif
            </div>
              <span>{{ __('BuyOne & GetOne') }}</span>
            </label>
            </div><!-- col-4 -->


            </div>

            
          </div><!-- form-layout -->
        </div><!-- card -->


      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection