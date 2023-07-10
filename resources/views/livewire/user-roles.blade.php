<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">{{ __('Admin List') }}
    <div class="d-inline float-end">
    <a class="btn btn-sm btn-warning" href="{{ route('admins.create') }}">{{ __('Add New') }}</a>
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
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('id')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('ID') }}</button>
                    <x-sort-icon field="id" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            
            <th class="wd-20p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('name')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Name') }}</button>
                    <x-sort-icon field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>

            <th class="wd-20p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('phone')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Phone') }}</button>
                    <x-sort-icon field="phone" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            
            <th class="wd-25p">
            <div class="d-flex align-items-center justify-content-center">
                <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black" aria-disabled="true">{{ __('Access') }}</button>
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
        @forelse ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                <span class="{{ getBadgeClass($user->category) }}">Category</span>
                <span class="{{ getBadgeClass($user->coupon) }}">Coupons</span>
                <span class="{{ getBadgeClass($user->product) }}">Products</span>
                <span class="{{ getBadgeClass($user->blog) }}">Blog</span>
                <span class="{{ getBadgeClass($user->orders) }}">Orders</span>
                <span class="{{ getBadgeClass($user->other) }}">Other</span>
                <span class="{{ getBadgeClass($user->report) }}">Reports</span>
                <span class="{{ getBadgeClass($user->role) }}">User Roles</span>
                <span class="{{ getBadgeClass($user->return_orders) }}">Return Orders</span>
                <span class="{{ getBadgeClass($user->contact) }}">Contact</span>
                <span class="{{ getBadgeClass($user->comment) }}">Comments</span>
                <span class="{{ getBadgeClass($user->setting) }}">Settings</span>
                <span class="{{ getBadgeClass($user->stock) }}">Stock</span>
            </td>
            <td>
            <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('admins.edit', $user) }}" class="btn btn-sm btn-info mr-2">{{ __('Edit') }}</a>
            <button wire:click="deleteId({{ $user->id }})" class="btn btn-sm btn-danger ml-2" data-bs-toggle="modal" data-bs-target="#modalDelete">{{__('Delete')}}</button>
            </div>
            </td>
        </tr>
        @empty
        <tr>      
          <td colspan="5" class="empty-table">No Data Found.</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $users->links() }}
    </div>

        <!-- LARGE MODAL -->
    <div wire:ignore.self id="modalDelete" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Delete Admin') }}</h6>
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