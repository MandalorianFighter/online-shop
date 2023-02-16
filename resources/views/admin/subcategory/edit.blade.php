@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>SubCategory Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">SubCategory Update
          <a href="{{ route('subcategories.index') }}" class="btn btn-secondary pd-x-20" style="float:right;">Back</a>
          </h6>

          <div class="table-wrapper">
            
          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              {{ Form::model($subcategory, ['route' => ['subcategories.update', $subcategory], 'method' => 'PUT']) }}
              <div class="modal-body pd-20">
                <div class="mb-3">
                  {{ Form::label('subcategory_name', 'SubCategory Name', ['class' => 'form-label']) }}
                  {{ Form::text('subcategory_name', $subcategory->subcategory_name, ['class' => 'form-control']) }}
                </div>

                <div class="mb-3">
                  {{ Form::label('category_id', 'Category Name', ['class' => 'form-label']) }}
                  {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
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