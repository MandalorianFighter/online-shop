<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">{{ __('Post List') }}
    <div class="d-inline float-end">
    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-warning float-end">{{ __('Add New') }}</a>
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
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('id')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('ID') }}</button>
                    <x-sort-icon field="id" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-20p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('title')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Post Title') }}</button>
                    <x-sort-icon field="title" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-15p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button wire:click="sortBy('category_name')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Post Category') }}</button>
                        <x-sort-icon field="category_name" :sortField="$sortField" :sortAsc="$sortAsc" />
                    </div>
                  </th>
            <th class="wd-20p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black ml-2" aria-disabled="true">{{ __('Image') }}</button>
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
        @forelse ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->category_name }}</td>
            <td><img src="{{ $post->getFirstMediaUrl('posts', 'thumb') }}" alt="{{ $post->title }} image" height="70em" max-width="100%"></td>
            <td>
            <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-info mr-2">{{ __('Edit') }}</a>
            <button wire:click="deleteId({{ $post->id }})" class="btn btn-sm btn-danger ml-2" data-bs-toggle="modal" data-bs-target="#modalDelete">{{__('Delete')}}</button>
            </div>
            </td>
        </tr>
        @empty
        <tr>      
          <td colspan="5" class="empty-table">{{ __('No Articles Found.') }}</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $posts->links() }}
    </div>
           <!-- LARGE MODAL -->
    <div wire:ignore.self id="modalDelete" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Delete Post') }}</h6>
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

