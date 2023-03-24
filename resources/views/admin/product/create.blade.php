@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">{{ __('Product Section') }}</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('New Product ADD') }}
            <a href="{{ route('products.index') }}" class="btn btn-success btn-sm pull-right">{{ __('All Products') }}</a>
          </h6>

          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif
          <p class="mg-b-20 mg-sm-b-30">{{ __('New Product Add Form') }}</p>

          {{ Form::open(['route' => 'products.store', 'files' => true]) }}

          <div class="form-layout">
            <div class="row mg-b-25">
            @foreach(config('translatable.locales') as $lang => $locale)
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label($locale."[product_name]", __('Product Name') ." ($lang)" . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text($locale."[product_name]", null, ['class' => 'form-control', 'placeholder' => __('Enter Product Name') ." ($lang)"]) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label($locale."[product_details]", __('Product Details') ." ($lang)" . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::textarea($locale."[product_details]", null, ['class' => 'form-control summernote']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label($locale."[color]", __('Product Color') ." ($lang)" . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text($locale."[color]", null, ['class' => 'form-control', 'placeholder' => __('Enter Product Color') ." ($lang)", 'id' => 'color', 'data-role' => 'tagsinput']) }}
                </div>
              </div><!-- col-4 -->
              </div>
              @endforeach
              <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('category_id', __('Product Category') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => __('Pick a category...'), 'id' => 'category', 'onChange' => 'loadSubcat(this);']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('subcategory_id', __('Product SubCategory') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::select('subcategory_id', array(), null, ['class' => 'form-control', 'placeholder' => __('Pick a subcategory...'), 'id' => 'subcat']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('brand_id', __('Product Brand') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::select('brand_id', $brands, null, ['class' => 'form-control', 'placeholder' => __('Pick a brand...')]) }}
                </div>
              </div><!-- col-4 -->
              </div>
              <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('code', __('Product Code') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => __('Enter Product Code')]) }}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('quantity', __('Product Quantity') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => __('Enter Product Quantity')]) }}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('size', __('Product Size') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('size', null, ['class' => 'form-control', 'placeholder' => __('Enter Product Size'), 'id' => 'size', 'data-role' => 'tagsinput']) }}
                </div>
              </div><!-- col-4 -->
              </div>
              
              
             <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label('video_link', __('Video Link') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('video_link', null, ['class' => 'form-control', 'placeholder' => __('Video Link')]) }}
                </div>
              </div><!-- col-4 -->

             
              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('image_one', __('Image One (Main Thumbnail)') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  <label class="custom-file">
                  {{ Form::file('image_one', ['class' => 'custom-file-input', 'id' => 'file', 'onChange' => 'readURL(this);', 'required']) }}
                    <span class="custom-file-control"></span>
                  </label>
                </div>
                <div>
                <img src="#" id="one" class="invisible">
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('image_two', __('Image Two') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  <label class="custom-file">
                  {{ Form::file('image_two', ['class' => 'custom-file-input', 'id' => 'file', 'onChange' => 'readURL2(this);', 'required']) }}
                    <span class="custom-file-control"></span>
                  </label>
                </div>
                <div>
                <img src="#" id="two" class="invisible">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('image_three', __('Image Three') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  <label class="custom-file">
                  {{ Form::file('image_three', ['class' => 'custom-file-input', 'id' => 'file', 'onChange' => 'readURL3(this);', 'required']) }}
                    <span class="custom-file-control"></span>
                  </label>
                </div>
                <div>
                <img src="#" id="three" class="invisible">
                </div>
              </div><!-- col-4 -->
           
            

            <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('discount_price', __('Discount Price') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::number('discount_price', null, ['class' => 'form-control', 'min' => 1, 'placeholder' => __('Enter Product Discount')]) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('selling_price', __('Selling Price') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('selling_price', null, ['class' => 'form-control', 'placeholder' => __('Enter Selling Price')]) }}
                </div>
            </div><!-- col-4 -->
            </div> 
          </div><!-- row -->
            <hr>
            <div class="row">

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('main_slider', 0) }}
              {{ Form::checkbox('main_slider', 1) }}
              <span>{{ __('Main Slider') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('hot_deal', 0) }}
              {{ Form::checkbox('hot_deal', 1) }}
              <span>{{ __('Hot Deal') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('best_rated', 0) }}
              {{ Form::checkbox('best_rated', 1) }}
              <span>{{ __('Best Rated') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('trend', 0) }}
              {{ Form::checkbox('trend', 1) }}
              <span>{{ __('Trend Product') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('mid_slider', 0) }}
              {{ Form::checkbox('mid_slider', 1) }}
              <span>{{ __('Mid Slider') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('hot_new', 0) }}
              {{ Form::checkbox('hot_new', 1) }}
              <span>{{ __('Hot New') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('buyone_getone', 0) }}
              {{ Form::checkbox('buyone_getone', 1) }}
              <span>{{ __('BuyOne & GetOne') }}</span>
            </label>
            </div><!-- col-4 -->

            </div>

            <hr>

            <div class="form-layout-footer">
            {{ Form::submit(__('Submit Form'), ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}





        
      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection