@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">{{ __('Blog Section') }}</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('New Post ADD') }}
            <a href="{{ route('posts.index') }}" class="btn btn-success btn-sm pull-right">{{ __('All Posts') }}</a>
          </h6>

          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif
          <p class="mg-b-20 mg-sm-b-30">{{ __('New Post Add Form') }}</p>

          {{ Form::open(['route' => 'posts.store', 'files' => true]) }}

          <div class="form-layout">
            <div class="row mg-b-25">

            <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('category_id', __('Blog Category') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::select('category_id', $blogCategories, null, ['class' => 'form-control', 'placeholder' => __('Pick a Blog Category'), 'id' => 'category']) }}
                </div>
            </div><!-- col-4 -->

            @foreach(config('translatable.locales') as $lang => $locale)
              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label("{{$locale}}[title]", __('Post Title') . " ($lang): <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                  {{ Form::text($locale."[title]", null, ['class' => 'form-control', 'placeholder' => __('Enter Post Title')]) }}
                </div>
              </div><!-- col-4 -->           
              
              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label("{{$locale}}[full_text]", __('Post Text') . " ($lang): <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                  {{ Form::textarea($locale."[full_text]", null, ['class' => 'form-control summernote']) }}
                </div>
              </div><!-- col-4 -->

              @endforeach

              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label('author', __('Post Author'). ": <span class='tx-danger'>*</span>", ['class' => 'form-control-label'])) !!}
                  {{ Form::text('author', null, ['class' => 'form-control', 'placeholder' => __('Enter Post Author')]) }}
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('post_image', __('Post Image') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  <div><label class="custom-file">
                  {{ Form::file('post_image', ['class' => 'custom-file-input', 'id' => 'file', 'onChange' => 'readURL(this);']) }}
                    <span class="custom-file-control"></span>
                  </label></div>
                </div>
                <div>
                <img src="#" id="one" class="invisible">
                </div>
              </div><!-- col-4 -->

              
            </div><!-- row -->
            <hr>

            <div class="form-layout-footer">
            {{ Form::submit(__('Create Post'), ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}

        
      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection
