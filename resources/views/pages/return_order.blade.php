@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
            <h6 class="card-body-title mt-3 mb-3">{{ __('Order List') }}</h6>
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Return</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $item)
                        <tr>
                            <td scope="col">{{$item->payment_type}}</td>
                            <td scope="col">
                            @if($item->return_order == 0)
                                <span class="badge rounded-pill text-bg-warning">No Request</span>
                            @elseif($item->return_order == 1)
                                <span class="badge rounded-pill text-bg-primary">Pending</span>
                            @elseif($item->return_order == 2)
                                <span class="badge rounded-pill text-bg-success">Success</span>
                            @endif
                            </td>
                            <td scope="col">{{$item->total}} $</td>
                            <td scope="col">{{$item->date}}</td>
                            <td scope="col">
                            @if($item->status == 0)
                                <span class="badge rounded-pill text-bg-warning">Pending</span>
                            @elseif($item->status == 1)
                                <span class="badge rounded-pill text-bg-primary">Payment Accepted</span>
                            @elseif($item->status == 2)
                                <span class="badge rounded-pill text-bg-warning">Progress</span>
                            @elseif($item->status == 3)
                                <span class="badge rounded-pill text-bg-success">Delivered</span>
                            @else
                                <span class="badge rounded-pill text-bg-danger">Canceled</span>
                            @endif
                            </td>
                            <td scope="col">
                            @if($item->return_order == 0)
                                <a href="#" class="btn btn-sm btn-warning return-order" id="{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#returnOrderModal">Return</a>
                            @else
                            <a href="#" class="btn btn-sm btn-secondary return-order disabled">Return</a>
                            @endif
                            </td>
                        </tr>
                        @empty
                        <tr>      
                            <td colspan="6" class="empty-table">No Orders Found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @include('profile.profile_menu')
        </div>
    </div>
</div>


<!-- Order Tracking Modal -->
<div class="modal fade" id="returnOrderModal" tabindex="-1" aria-labelledby="returnOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="returnOrderModalLabel">Return Order</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.return') }}" method="post">
			@csrf
			<div class="modal-body">
                <div class="mb-3">
                    <h4>{{ __('Are you sure, you want to return the order?') }}</h4>
                </div>
                <input type="hidden" id="order_id" name="order_id">
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-danger" type="submit">Return</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>
</div>

@endsection
