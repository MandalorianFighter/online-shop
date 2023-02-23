@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Blog Section</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Post ADD
            <a href="{{ route('posts.index') }}" class="btn btn-success btn-sm pull-right">All Posts</a>
          </h6>

          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif
          <p class="mg-b-20 mg-sm-b-30">New Post Add Form</p>

          {{ Form::open(['route' => 'posts.store', 'files' => true]) }}

          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('post_title_eng', 'Post Title (Eng): <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('post_title_eng', null, ['class' => 'form-control', 'placeholder' => 'Enter Post Title in English']) }}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('post_title_ukr', 'Post Title (Ukr): <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('post_title_ukr', null, ['class' => 'form-control', 'placeholder' => 'Enter Post Title in Ukrainian']) }}
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  {!! Html::decode(Form::label('category_id', 'Blog Category: <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::select('category_id', $blogCategories, null, ['class' => 'form-control', 'placeholder' => 'Pick a Blog Category', 'id' => 'category']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label('details_eng', 'Post Details (Eng): <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::textarea('details_eng', null, ['class' => 'form-control', 'id' => 'summernote']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label('details_ukr', 'Post Details (Ukr): <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::textarea('details_ukr', null, ['class' => 'form-control', 'id' => 'summernote1']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  {!! Html::decode(Form::label('post_image', 'Post Image: <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
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
            {{ Form::submit('Submit Form', ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}

        
      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection