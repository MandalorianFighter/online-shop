@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Brand Update') }}</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('Brand Update') }}
          <a href="{{ route('brands.index') }}" class="btn btn-secondary pd-x-20" style="float:right;">{{ __('Back') }}</a>
          </h6>

          <div class="table-wrapper">
            
          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              {{ Form::model($brand, ['route' => ['brands.update', $brand], 'method' => 'PUT', 'files' => true]) }}
              <div class="modal-body pd-20">
                <div class="mb-3">
                  {{ Form::label('brand_name', __('Brand Name'), ['class' => 'form-label']) }}
                  {{ Form::text('brand_name', $brand->brand_name, ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                  {{ Form::label('brand_logo', __('Brand Logo'), ['class' => 'form-label']) }}
                  {{ Form::file('brand_logo', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                  {{ Form::label('old_brand_logo', __('Old Brand Logo'), ['class' => 'form-label']) }}
                  <img id="old_brand_logo" src="{{ $brand->getFirstMediaUrl('brands') }}" alt="logo"  height="70em" max-width="100%">
                </div>
              </div><!-- modal-body -->

              <div class="modal-footer">
                {{ Form::submit(__('Update'), ['class' => 'btn btn-info pd-x-20']) }}
              </div>
              {{ Form::close() }}

          </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection