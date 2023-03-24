@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('SubCategory Update') }}</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('SubCategory Update') }}
          <a href="{{ route('subcategories.index') }}" class="btn btn-secondary pd-x-20" style="float:right;">{{ __('Back') }}</a>
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
              @foreach(config('translatable.locales') as $lang => $locale)
                <div class="mb-3">
                  {{ Form::label($locale."[subcategory_name]", __('SubCategory Name') ." ($lang)", ['class' => 'form-label']) }}
                  {{ Form::text($locale."[subcategory_name]", $subcategory->translate($locale), ['class' => 'form-control']) }}
                </div>
                @endforeach

                <div class="mb-3">
                  {{ Form::label('category_id', __('Category Name'), ['class' => 'form-label']) }}
                  {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
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