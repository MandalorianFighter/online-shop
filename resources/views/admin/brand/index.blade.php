@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Brand List</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Brand List
          <a href="" class="btn btn-sm btn-warning" style="float:right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Brand Name</th>
                  <th class="wd-15p">Brand Logo</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($brands as $key => $brand)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $brand->brand_name }}</td>
                  <td><img src="{{ $brand->getFirstMediaUrl('brands') }}" alt="{{ $brand->brand_name }} logo" height="70em" max-width="100%"></td>
                  <td>
                    <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-info">Edit</a>
                    <form method="POST" action="{{ route('brands.destroy', $brand) }}" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" id="delete">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              <form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">            
                @csrf
              <div class="modal-body pd-20">
                <div class="mb-3">
                    <label for="brandInput" class="form-label">Brand Name</label>
                    <input type="text" class="form-control" id="brandInput" placeholder="Brand" name="brand_name">
                </div>
                <div class="mb-3">
                    <label for="brandLogoInput" class="form-label">Brand Logo</label>
                    <input type="file" class="form-control" id="brandLogoInput" placeholder="Brand Logo" name="brand_logo">
                </div>
              </div><!-- modal-body -->

              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection