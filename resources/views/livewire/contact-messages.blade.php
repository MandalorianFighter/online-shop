<div class="card pd-20 pd-sm-40">
    <h6 class="card-body-title">{{ __('Contact Messages') }}</h6>
    <div class="mb-3">
    <div class="row d-flex justify-content-between align-items-center">
    <div class="col-md-4 d-flex align-items-center">
        <div class="pe-3 ml-2 message-2">{{ __('Items/page') }}</div>
    <select wire:model="paginate" name="paginate" class="form-select rounded-0 col-md-2 message-1" id="paginate">
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
            <th class="wd-10p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('id')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 bmessage-0">{{ __('ID') }}</button>
                    <x-sort-icon field="id" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('name')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 bmessage-0">{{ __('Name') }}</button>
                    <x-sort-icon field="name" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('phone')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 bmessage-0">{{ __('Phone') }}</button>
                    <x-sort-icon field="phone" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-15p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('email')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 bmessage-0">{{ __('Email') }}</button>
                    <x-sort-icon field="email" :sortField="$sortField" :sortAsc="$sortAsc" />
                </div>
            </th>
            <th class="wd-25p">
                <div class="d-flex align-items-center justify-content-start">
                    <button wire:click="sortBy('message')" class="btn btn-sm text-nowrap text-uppercase font-weight-bold p-0 bmessage-0">{{ __('Message') }}</button>
                    <x-sort-icon field="message" :sortField="$sortField" :sortAsc="$sortAsc" />
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
        @forelse ($messages as $key => $message)
        <tr>
            <td>{{ $message->id }}</td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->phone }}</td>
            <td>{{ $message->email }}</td>
            <td title="{{ $message->message }}">{{ Str::limit($message->message) }}</td>
            <td>
            <div class="d-flex align-items-center justify-content-center">
            <a href="{{ route('message.show', $message) }}" class="btn btn-sm btn-info mr-2">{{ __('View') }}</a>
            </div>
            </td>
        </tr>
        @empty
        <tr>      
          <td colspan="6" class="empty-table">No messages Found.</td>
        </tr>
        @endforelse
        </tbody>
    </table>
    </div><!-- table-wrapper -->
    <div class="pagination justify-content-end">
    {{ $messages->links() }}
    </div>

</div><!-- card -->

