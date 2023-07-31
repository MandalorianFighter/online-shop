@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">{{ __('SEO Settings') }}</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('SEO Settings Create') }}</h6>

          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

          {{ Form::open(['route' => 'admin.seo.store']) }}
          <div class="form-layout">
            <div class="row mg-b-25">

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('page_url', __('Page URL') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::select('page_url', $urls, null, ['class' => 'form-control', 'placeholder' => __('Select a Page Url'), 'id' => 'page_url']) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                <label for="custom_option" class="form-control-label"><span class="tx-danger">*</span></label>
                <input type="text" id="custom_option" name="custom_option" style="display:none;" class="form-control" placeholder="{{__('Write Down a URL')}}" pattern="https?://.+" />
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('page_title', __('Page Title') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {!! Form::text('page_title', null, ['class' => 'form-control', 'placeholder' => __('Enter Page Title'), 'maxlength' => '200']) !!}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('meta_author', __('Meta Author') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('meta_author', null, ['class' => 'form-control', 'placeholder' => __('Enter Meta Author'), 'maxlength' => '160']) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('meta_keywords', __('Meta Keywords') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('meta_keywords', null, ['class' => 'form-control', 'placeholder' => __('Enter Meta Keywords'), 'maxlength' => '255']) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label("meta_description", __('Meta Description') . ": <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                  {{ Form::textarea("meta_description", null, ['class' => 'form-control summernote', 'placeholder' => __('Enter Meta Description'), 'maxlength' => '200']) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
            <div class="form-group">
                {!! Html::decode(Form::label("google_analytics", __('Google Analytics') . ": <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                {{ Form::textarea("google_analytics", null, ['class' => 'form-control summernote', 'placeholder' => __('Enter Code For Google Analytics')]) }}
            </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
            <div class="form-group">
                {!! Html::decode(Form::label("bing_analytics", __('Bing Analytics') . ": <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                {{ Form::textarea("bing_analytics", null, ['class' => 'form-control summernote', 'placeholder' => __('Enter Code For Bing Analytics')]) }}
            </div>
            </div><!-- col-4 -->

            </div><!-- row -->
            <hr>

            <div class="form-layout-footer">
            {{ Form::submit(__('Create SEO'), ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}

        
      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection