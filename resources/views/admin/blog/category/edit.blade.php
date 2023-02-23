@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Blog Category Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Blog Category Update
          <a href="{{ route('blog-categories.index') }}" class="btn btn-secondary pd-x-20" style="float:right;">Back</a>
          </h6>

          <div class="table-wrapper">
            
          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              {{ Form::model($blogCategory, ['route' => ['blog-categories.update', $blogCategory], 'method' => 'PUT']) }}
              <div class="modal-body pd-20">
                <div class="mb-3">
                  {{ Form::label('category_name_eng', 'Category Name (Eng)', ['class' => 'form-label']) }}
                  {{ Form::text('category_name_eng', $blogCategory->category_name_eng, ['class' => 'form-control']) }}
                </div>
                            
                <div class="mb-3">
                  {{ Form::label('category_name_ukr', 'Category Name (Ukr)', ['class' => 'form-label']) }}
                  {{ Form::text('category_name_ukr', $blogCategory->category_name_ukr, ['class' => 'form-control']) }}
                </div>
              </div><!-- modal-body -->

              <div class="modal-footer">
                {{ Form::submit('Update', ['class' => 'btn btn-info pd-x-20']) }}
              </div>
              {{ Form::close() }}

          </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection