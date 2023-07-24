<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">{{ __('Category List') }}
    <div class="d-inline float-end">
    <a class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalCreate">{{ __('Add New') }}</a>
    </div>
    </h6>
    <div class="mb-3">
    <div class="row d-flex justify-content-between align-items-center">
    <div class="col-md-4 d-flex align-items-center">
        <div class="pe-3 ml-2 order-2">{{ __('Items/page') }}</div>
    <select wire:model="paginate" name="paginate" class="form-select rounded-0 col-md-2 order-1" id="paginate">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
    </select>
    </div>
    
    <div class="input-group col-lg-2 float-right">
    <input wire:model="search" class="form-control" type="search" name="search" placeholder="Search">
    </div>
    </div>
    </div>
    <div class="table-wrapper">
    
    <table class="table display responsive nowrap">
        <thead>
        <tr>
            <th class="wd-20p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('id')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('ID') }}</button>
                    <x-sort-icon field="id" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            
            <th class="wd-20p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('category_name')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Category Name') }}</button>
                    <x-sort-icon field="category_name" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-20p">
              <div class="d-flex align-items-center justify-content-start">
                  <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black ml-2" aria-disabled="true">{{ __('Category Logo') }}</button>
              </div>
            </th>
            <th class="wd-20p">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black" aria-disabled="true">{{ __('Action') }}</button>
            </div>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $key => $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->category_name }}</td>
            <td><img src="{{ $category->getFirstMediaUrl('categories') }}" alt="{{ $category->category_name }} logo" height="70em" max-width="100%"></td>
            <td>
            <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-info mr-2">{{ __('Edit') }}</a>
            <button wire:click="deleteId({{ $category->id }})" class="btn btn-sm btn-danger ml-2" data-bs-toggle="modal" data-bs-target="#modalDelete">{{__('Delete')}}</button>
            </div>
            </td>
        </tr>
        @empty
        <tr>      
          <td colspan="3" class="empty-table">No Categories Found.</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $categories->links() }}
    </div>
           <!-- LARGE MODAL -->
    <div wire:ignore.self id="modalDelete" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Delete Category') }}</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body pd-20">
                <div class="mb-3">
                <h5>{{ __('Are you sure, you want to delete?') }}</h5>
                </div>
              </div><!-- modal-body -->

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" wire:click="confirmDelete()" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Yes, Delete') }}</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- LARGE MODAL -->
    <div id="modalCreate" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Add Category') }}</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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

              {{ Form::open(['route' => 'categories.store', 'files' => true]) }}
              <div class="modal-body pd-20">
              @foreach(config('translatable.locales') as $lang => $locale)
                <div class="mb-3">
                  {{ Form::label($locale."[category_name]", __('Category Name') ." ($lang)", ['class' => 'form-label']) }}
                  {{ Form::text($locale."[category_name]", null, ['class' => 'form-control', 'placeholder' => __('Category Name') ." ($lang)"]) }}
                </div>
                @endforeach 
                <div class="mb-3">
                  {{ Form::label('category_logo', __('Category Logo'), ['class' => 'form-label']) }}
                  {{ Form::file('category_logo', ['class' => 'form-control', 'placeholder' => __('Category Logo')]) }}
                </div> 
              </div><!-- modal-body -->

              <div class="modal-footer">
                {{ Form::submit(__('Submit'), ['class' => 'btn btn-info pd-x-20']) }}
                {{ Form::button(__('Close'), ['class' => 'btn btn-secondary pd-x-20', 'data-bs-dismiss' => 'modal']) }}
              </div>
              {{ Form::close() }}
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
</div><!-- card -->
