<div class="card pd-20 pd-sm-40">
    <h5 class="card-body-title">{{ __('Order List') }}</h5>
    <div>
        <h5><span class="badge badge-success">{{ __('Total Amount For Selected Values') }}: {{ $total }}$</span></h5>
    </div>
    <div class="mb-3">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="ml-2 order-2">{{ __('Items/page') }}</div>
        <select wire:model="paginate" name="paginate" class="form-select rounded-0 order-1" id="paginate">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        </div>
        <div>
            <div class="input-group d-flex align-items-center pl-0">
                <label for="date" class="text-nowrap mr-2 mb-0">{{ __('Date') }}</label>
                <input type="date" wire:model="date" name="date" class="form-control">        
            </div>
        </div>
        
        <div>
            <div class="input-group d-flex align-items-center">
                <label for="date" class="text-nowrap mr-2 mb-0">{{ __('Month') }}</label>
                <select wire:model="month" name="month" class="form-select rounded-0 order-1">
                    <option value="">{{ __('Select Month') }}</option>
                    @foreach($monthes as $key=>$month)
                    <option value="{{$key}}">{{$month}}</option>
                    @endforeach
                </select>    
            </div>
        </div>
        
        <div>
            <div class="input-group d-flex align-items-center">
                <label for="date" class="text-nowrap mr-2 mb-0">{{ __('Year') }}</label>
                <select wire:model="year" name="year" class="form-select rounded-0 order-1">
                    <option value="">{{ __('Select Year') }}</option>
                    @foreach($years as $key=>$year)
                    <option value="{{$key}}">{{$year}}</option>
                    @endforeach
                </select>    
            </div>
        </div>
        
    <div class="input-group col-md-2 float-right pr-0">
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
                    <button wire:click="sortBy('id')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('ID') }}</button>
                    <x-sort-icon field="id" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-10p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('payment_type')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Payment Type') }}</button>
                    <x-sort-icon field="payment_type" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-20p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('balance_transaction')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Transaction ID') }}</button>
                    <x-sort-icon field="balance_transaction" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-10p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('subtotal')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Subtotal') }}</button>
                    <x-sort-icon field="subtotal" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-10p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('shipping')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Shipping') }}</button>
                    <x-sort-icon field="shipping" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-10p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('total')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Total') }}</button>
                    <x-sort-icon field="total" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-10p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('date')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Date') }}</button>
                    <x-sort-icon field="date" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-10p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('status')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 border-0">{{ __('Status') }}</button>
                    <x-sort-icon field="status" :sortField="$sortField" :sortAsc="$sortAsc" />
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
        @forelse ($orders as $key => $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->payment_type }}</td>
            <td>{{ $order->balance_transaction }}</td>
            <td>{{ $order->subtotal }} $</td>
            <td>{{ $order->shipping }} $</td>
            <td>{{ $order->total }} $</td>
            <td>{{ $order->date->format('d-m-Y') }}</td>
            <td>
            @if($order->status == 0)
                <span class="badge badge-warning">{{ __('Pending') }}</span>
            @elseif($order->status == 1)
                <span class="badge badge-info">{{ __('Payment Accepted') }}</span>
            @elseif($order->status == 2)
                <span class="badge badge-warning">{{ __('Progress') }}</span>
            @elseif($order->status == 3)
                <span class="badge badge-success">{{ __('Delivered') }}</span>
            @else
                <span class="badge badge-danger">{{ __('Canceled') }}</span>
            @endif
            </td>
            <td>
            <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('admin.view_order', $order) }}" class="btn btn-sm btn-info mr-2">{{ __('View') }}</a>
            </div>
            </td>
        </tr>
        @empty
        <tr>      
          <td colspan="9" class="empty-table">{{ __('No Orders Found.') }}</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $orders->links() }}
    </div>

</div><!-- card -->
