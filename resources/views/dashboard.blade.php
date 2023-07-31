@extends('layouts.app')
@section('content')
@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
@endpush

<div class="contact_form mt-5">
        <div class="container">
            <div class="row">
                <div class="col-8 card">
                    <h6 class="card-body-title mt-3 mb-3">{{ __('Order List') }}</h6>
                    {!! $dataTable->table(['class' => 'table', 'id' => 'orders-table']) !!}
                </div>
                @include('profile.profile_menu')
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts(null, ['type' => 'module']) !!}
@endpush