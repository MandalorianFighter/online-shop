@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand Update
          <a href="{{ route('brands.index') }}" class="btn btn-secondary pd-x-20" style="float:right;">Back</a>
          </h6>

          <div class="table-wrapper">
            
          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              <form method="POST" action="{{ route('brands.update', $brand) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="modal-body pd-20">
                <div class="mb-3">
                    <label for="brandInput" class="form-label">Brand Name</label>
                    <input type="text" class="form-control" id="brandInput" value="{{ $brand->brand_name }}" name="brand_name">
                </div>
                <div class="mb-3">
                    <label for="brandLogoInput" class="form-label">Brand Logo</label>
                    <input type="file" class="form-control" id="brandLogoInput" name="brand_logo">
                </div>
                <div class="mb-3">
                    <label for="brandOldLogo" class="form-label">Old Brand Logo</label>
                    <img id="brandOldLogo" src="{{ $brand->getFirstMediaUrl('brands') }}" alt="logo"  height="70em" max-width="100%">
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