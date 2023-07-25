<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">{{ __('Product List') }}
    <a href="{{ route('products.create') }}" class="btn btn-sm btn-warning" style="float:right;">{{ __('Add New') }}</a>
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
            <div class="col-md-4 d-flex justify-content-end align-items-center">
            <div class="form-check form-switch">
              <input class="form-check-input" wire:model="status" id="status" type="checkbox" role="switch" @if($status) checked @endif>
            </div>
            <div class="ml-2 text-sm">
                <label for="status" class="fw-medium">Active</label>
            </div>
            </div>
            <div class="input-group col-lg-2">
                <input wire:model="search" class="form-control" type="search" name="search" placeholder="{{ __('Search') }}">
            </div>
        </div>
    </div>

    <div class="table-wrapper">
            <table class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-10p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button wire:click="sortBy('code')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Product Code') }}</button>
                        <x-sort-icon field="code" :sortField="$sortField" :sortAsc="$sortAsc" />
                    </div>
                  </th>
                  <th class="wd-15p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button wire:click="sortBy('product_name')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Product Name') }}</button>
                        <x-sort-icon field="product_name" :sortField="$sortField" :sortAsc="$sortAsc" />
                    </div>
                  </th>
                  <th class="wd-10p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black ml-2" aria-disabled="true">{{ __('Image') }}</button>
                    </div>
                  </th>
                  <th class="wd-15p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button wire:click="sortBy('category_name')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Category') }}</button>
                        <x-sort-icon field="category_name" :sortField="$sortField" :sortAsc="$sortAsc" />
                    </div>
                  </th>
                  <th class="wd-10p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button wire:click="sortBy('brand_name')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Brand') }}</button>
                        <x-sort-icon field="brand_name" :sortField="$sortField" :sortAsc="$sortAsc" />
                    </div>
                  </th>
                  <th class="wd-10p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button wire:click="sortBy('quantity')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Quantity') }}</button>
                        <x-sort-icon field="quantity" :sortField="$sortField" :sortAsc="$sortAsc" />
                    </div>
                  </th>
                  <th class="wd-10p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black ml-2" aria-disabled="true">{{ __('Status') }}</button>
                    </div>
                  </th>
                  <th class="wd-15p">
                    <div class="d-flex align-items-center justify-content-start">
                        <button class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 disabled border-0 text-black ml-2" aria-disabled="true">{{ __('Action') }}</button>
                    </div>
                  </th>
                </tr>
              </thead>
              <tbody>
              @forelse ($products as $key => $product)
                <tr>
                  <td>{{ $product->code }}</td>
                  <td title="{{ $product->product_name }}">{{ $product->limitName() }}</td>
                  <td><img src="{{ $product->getFirstMediaUrl('products/imageOne', 'thumb') }}" alt="{{ $product->name }} logo" height="70em" max-width="100%"></td>
                  <td>{{ $product->category->category_name }}</td>
                  <td>{{ $product->brand->brand_name }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td class="text-center">
                    @livewire('toggle-switch', ['model' => $product, 'field' => 'status'], key($product->id))
                  </td>
                  <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                    <button wire:click="deleteId({{ $product->id }})" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"><i class="fa fa-trash"></i></button>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-info" title="Show"><i class="fa fa-eye"></i></a>
                  </td>
                </tr>
                @empty
                <tr>      
                  <td colspan="8" class="empty-table">{{ __('No Products Found.') }}</td>
                </tr>
                @endforelse
              </tbody>
            </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $products->links() }}
    </div>
    <!-- LARGE MODAL -->
    <div wire:ignore.self id="modalDelete" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Delete Product') }}</h6>
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