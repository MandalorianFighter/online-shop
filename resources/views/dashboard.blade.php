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
                            <th scope="col">Payment ID</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status Code</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $item)
                        <tr>
                            <td scope="col">{{$item->payment_type}}</td>
                            <td scope="col">{{$item->payment_id}}</td>
                            <td scope="col">{{$item->total}} $</td>
                            <td scope="col">{{$item->date}}</td>
                            <td scope="col">{{$item->status_code}}</td>
                            <td scope="col"><a href="{{ route('view.order', $item) }}" class="btn btn-sm btn-info">View</a></td>
                        </tr>
                        @empty
                        <tr>      
                            <td colspan="6" class="empty-table">No Orders Found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('frontend/images/profile-1.jpg') }}" alt="" class="card-img-top" style="height:90px; width:90px; margin-left:39%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ auth()->user()->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flash">
                        <li class="list-group-item"><a href="{{ route('password.change') }}">{{ __('Change Password') }}</a></li>
                        <li class="list-group-item">line one</li>
                        <li class="list-group-item">line one</li>
                    </ul>
                    <div class="card-body d-grid gap-2">
                    <a href="{{ route('user.logout') }}" class="btn btn-sm btn-light">{{ __('Logout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
