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
                            <th scope="col">{{ __('Payment Type') }}</th>
                            <th scope="col">{{ __('Payment ID') }}</th>
                            <th scope="col">{{ __('Amount') }}</th>
                            <th scope="col">{{ __('Date') }}</th>
                            <th scope="col">{{ __('Status') }}</th>
                            <th scope="col">{{ __('Status Code') }}</th>
                            <th scope="col">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $item)
                        <tr>
                            <td scope="col">{{$item->payment_type}}</td>
                            <td scope="col">{{$item->payment_id}}</td>
                            <td scope="col">{{$item->total}} $</td>
                            <td scope="col">{{$item->date}}</td>
                            <td scope="col">
                            @if($item->status == 0)
                                <span class="badge rounded-pill text-bg-warning">{{ __('Pending') }}</span>
                            @elseif($item->status == 1)
                                <span class="badge rounded-pill text-bg-primary">{{ __('Payment Accepted') }}</span>
                            @elseif($item->status == 2)
                                <span class="badge rounded-pill text-bg-warning">{{ __('Progress') }}</span>
                            @elseif($item->status == 3)
                                <span class="badge rounded-pill text-bg-success">{{ __('Delivered') }}</span>
                            @else
                                <span class="badge rounded-pill text-bg-danger">{{ __('Canceled') }}</span>
                            @endif
                            </td>
                            <td scope="col">{{$item->status_code}}</td>
                            <td scope="col"><a href="{{ route('view.order', $item) }}" class="btn btn-sm btn-info">{{ __('View') }}</a></td>
                        </tr>
                        @empty
                        <tr>      
                            <td colspan="7" class="empty-table">{{ __('No Orders Found.') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @include('profile.profile_menu')
        </div>
    </div>
</div>
@endsection
