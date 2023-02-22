@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details Page
            <a href="{{ route('products.index') }}" class="btn btn-success btn-sm pull-right">All Products</a>
          </h6>

  
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  {{ Form::label('name', 'Product Name: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->name }}</strong></p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('code', 'Product Code: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->code }}</strong></p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('quantity', 'Product Quantity: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->quantity }}</strong></p>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                {{ Form::label('category_id', 'Product Category: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->category->category_name }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                {{ Form::label('subcategory_id', 'Product SubCategory: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->subcategory->subcategory_name }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                {{ Form::label('brand_id', 'Product Brand: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->brand->brand_name }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('size', 'Product Size: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->size }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('color', 'Product Color: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->color }}</strong></p>
                </div>
              </div><!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group">
                {{ Form::label('selling_price', 'Selling Price: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->selling_price }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                {{ Form::label('details', 'Product Details: ', ['class' => 'form-control-label']) }}
                  <p>{!! $product->details !!}</p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                {{ Form::label('video_link', 'Video Link: ', ['class' => 'form-control-label']) }}
                  <p><strong>{{ $product->video_link }}</strong></p>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group row">
                {{ Form::label('image_one', 'Image One (Main Thumbnail): ', ['class' => 'form-control-label']) }}
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
                {{ Form::label('image_two', 'Image Two: ', ['class' => 'form-control-label']) }}
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
                {{ Form::label('image_three', 'Image Three: ', ['class' => 'form-control-label']) }}
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
              @if($product->main_slider == 1)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
              <span>Main Slider</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
            @if($product->hot_deal == 1)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
              <span>Hot Deal</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
              @if($product->best_rated == 1)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
              <span>Best Rated</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
              @if($product->trend == 1)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
              <span>Trend Product</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
              @if($product->mid_slider == 1)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
              <span>Mid Slider</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="">
              @if($product->hot_new == 1)
              <span class="badge badge-success">Active</span>
              @else
              <span class="badge badge-danger">Inactive</span>
              @endif
              <span>Hot New</span>
            </label>
            </div><!-- col-4 -->

            </div>

            
          </div><!-- form-layout -->
        </div><!-- card -->


      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection