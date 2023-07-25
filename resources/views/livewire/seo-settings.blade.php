<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">{{ __('SEO Settings List') }}
    <div class="d-inline float-end">
    <a class="btn btn-sm btn-warning" href="{{ route('admin.seo.create') }}">{{ __('Add New') }}</a>
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
    <input wire:model="search" class="form-control" type="search" name="search" placeholder="{{ __('Search') }}">
    </div>
    </div>
    </div>
    <div class="table-wrapper">
    
    <table class="table display responsive nowrap">
        <thead>
        <tr>
            <th class="wd-5p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('id')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('ID') }}</button>
                    <x-sort-icon field="id" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('page_url')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Page URL') }}</button>
                    <x-sort-icon field="page_url" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>

            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('page_title')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Page Title') }}</button>
                    <x-sort-icon field="page_title" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('meta_author')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Meta Author') }}</button>
                    <x-sort-icon field="meta_author" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>

            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('meta_keywords')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Meta Keywords') }}</button>
                    <x-sort-icon field="meta_keywords" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>

            <th class="wd-20p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('meta_description')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Meta Description') }}</button>
                    <x-sort-icon field="meta_description" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>

            <th class="wd-15p">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black" aria-disabled="true">{{ __('Action') }}</button>
            </div>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse ($seopages as $seo)
        <tr>
            <td>{{ $seo->id }}</td>
            <td><a href="{{ $seo->page_url }}">{{ $seo->page_url }}</a></td>
            <td>{{ $seo->page_title }}</td>
            <td>{{ $seo->meta_author }}</td>
            <td title="{{ $seo->meta_keywords }}">{!! Str::limit($seo->meta_keywords) !!}</td>
            <td title="{{ $seo->meta_description }}">{!! Str::limit($seo->meta_description) !!}</td>
            <td>
            <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('admin.seo.edit', $seo) }}" class="btn btn-sm btn-info mr-2">{{ __('Edit') }}</a>
            <button wire:click="deleteId({{ $seo->id }})" class="btn btn-sm btn-danger ml-2" data-bs-toggle="modal" data-bs-target="#modalDelete">{{__('Delete')}}</button>
            </div>
            </td>
        </tr>
        @empty
        <tr>      
          <td colspan="5" class="empty-table">{{ __('No Data Found.') }}</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $seopages->links() }}
    </div>

        <!-- LARGE MODAL -->
    <div wire:ignore.self id="modalDelete" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Delete SEO Settings') }}</h6>
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
                
</div><!-- card -->
