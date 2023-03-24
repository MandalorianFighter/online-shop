@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Category Update') }}</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('Category Update') }}
          <a href="{{ route('categories.index') }}" class="btn btn-secondary pd-x-20" style="float:right;">{{ __('Back') }}</a>
          </h6>

          <div class="table-wrapper">
            
          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              {{ Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PUT']) }}
              <div class="modal-body pd-20">
                @foreach(config('translatable.locales') as $lang => $locale)
                <div class="mb-3">
                  {{ Form::label($locale."[category_name]", __('Category Name') ." ($lang)", ['class' => 'form-label']) }}
                  {{ Form::text($locale."[category_name]", $category->translate($locale)->category_name, ['class' => 'form-control']) }}
                </div>
                @endforeach   
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