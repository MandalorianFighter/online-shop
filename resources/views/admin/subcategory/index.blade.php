@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('SubCategory List') }}</h5>
        </div><!-- sl-page-title -->

        <livewire:subcategory-table />

        <!-- <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('SubCategory List') }}
          <a href="" class="btn btn-sm btn-warning" style="float:right;" data-bs-toggle="modal" data-bs-target="#modaldemo3">{{ __('Add New') }}</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">{{ __('SubCategory Name') }}</th>
                  <th class="wd-15p">{{ __('Category Name') }}</th>
                  <th class="wd-20p">{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($subcategories as $key => $subcategory)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $subcategory->subcategory_name }}</td>
                  <td>{{ $subcategory->category->category_name }}</td>
                  <td>
                    <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                    {{ Form::model($subcategory, ['route' => ['subcategories.destroy', $subcategory], 'method' => 'DELETE', 'style' => 'display:inline-block;']) }}
                    {{ Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger', 'id' => 'delete']) }}
                    {{ Form::close() }}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div> 
        </div> -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection