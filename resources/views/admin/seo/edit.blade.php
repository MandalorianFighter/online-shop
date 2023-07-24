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
          <h6 class="card-body-title">{{ __('SEO Settings Update') }} - {{ $seo->page_url }}</h6>

          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

          {{ Form::model($seo, ['route' => ['admin.seo.update', $seo], 'method' => 'PUT']) }}
          <div class="form-layout">
            <div class="row mg-b-25">

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('page_title', __('Meta Title') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {!! Form::text('page_title', $seo->page_title, ['class' => 'form-control', 'placeholder' => __('Enter Meta Title')]) !!}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('meta_author', __('Meta Author') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('meta_author', $seo->meta_author, ['class' => 'form-control', 'placeholder' => __('Enter Meta Author')]) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('meta_keywords', __('Meta Keywords') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('meta_keywords', $seo->meta_keywords, ['class' => 'form-control', 'placeholder' => __('Enter Meta Keywords')]) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label("meta_description", __('Meta Description') . ": <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                  {{ Form::textarea("meta_description", "$seo->meta_description", ['class' => 'form-control summernote']) }}
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
            <div class="form-group">
                {!! Html::decode(Form::label("google_analytics", __('Google Analytics') . ": <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                {{ Form::textarea("google_analytics", "$seo->google_analytics", ['class' => 'form-control summernote']) }}
            </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
            <div class="form-group">
                {!! Html::decode(Form::label("bing_analytics", __('Bing Analytics') . ": <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                {{ Form::textarea("bing_analytics", "$seo->bing_analytics", ['class' => 'form-control summernote']) }}
            </div>
            </div><!-- col-4 -->

            </div><!-- row -->
            <hr>

            <div class="form-layout-footer">
            {{ Form::submit(__('Update Seo'), ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}

        
      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection