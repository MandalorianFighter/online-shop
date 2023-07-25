<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">{{ __('Subscriber List') }}
    <div class="d-inline float-end">
    <button wire:click="deleteSubscribers" class="btn btn-sm btn-warning">{{ __('Delete Chosen') }}</button>
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
            <input type="checkbox" wire:model="selectAll">
            <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black ml-2" aria-disabled="true">{{ __('Select All') }}</button>
            </div>
            </th>
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('id')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('ID') }}</button>
                    <x-sort-icon field="id" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('email')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Email') }}</button>
                    <x-sort-icon field="email" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('created_at')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Subscribing Time') }}</button>
                    <x-sort-icon field="created_at" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-20p">
            <div class="d-flex align-items-center justify-content-start">
                <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black" aria-disabled="true">{{ __('Action') }}</button>
            </div>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse ($subscribers as $key => $subscriber)
        <tr>
            <td><input  wire:model="selected" value="{{ $subscriber->id }}" type="checkbox"></td>
            <td>{{ $subscriber->id }}</td>
            <td>{{ $subscriber->email }}</td>
            <td>{{ $subscriber->created_at->diffForHumans() }}</td>
            <td>
            <div class="d-inline float-start">
            <button wire:click="deleteId({{ $subscriber->id }})" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">{{__('Delete')}}</button>
            </div>
            </td>
        </tr>
        @empty
        <tr>      
          <td colspan="5" class="empty-table">{{ __('No Subscribers Found.') }}</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $subscribers->links() }}
    </div>
           <!-- LARGE MODAL -->
    <div wire:ignore.self id="modalDelete" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Delete Subscriber') }}</h6>
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


    