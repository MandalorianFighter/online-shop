@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category Update
          <a href="{{ route('categories.index') }}" class="btn btn-secondary pd-x-20" style="float:right;">Back</a>
          </h6>

          <div class="table-wrapper">
            
          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              <form method="POST" action="{{ route('categories.update', $category) }}">
                @csrf
                @method('PUT')
              <div class="modal-body pd-20">
                <div class="mb-3">
                    <label for="categoryInput" class="form-label">Category name</label>
                    <input type="text" class="form-control" id="categoryInput" value="{{ $category->category_name }}" name="category_name">
                </div>
              </div><!-- modal-body -->

              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
              </form>

          </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection