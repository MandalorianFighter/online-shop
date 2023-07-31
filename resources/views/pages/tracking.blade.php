@extends('layouts.app')

@section('content')
@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
@endpush

<div class="contact-form mt-5 mb-3">
    <div class="container">
        <div class="row">
            <div class="col-5 offset-lg-1">
                <div class="contact_form_title mb-3"><h4>{{ __('Your Order Status') }}</h4></div>

                
                <div class="progress-stacked">
                    @if($track->status == 0)
                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <div class="progress-bar bg-warning"></div>
                    </div>
                    @elseif($track->status == 1)
                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <div class="progress-bar bg-warning"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        <div class="progress-bar bg-primary"></div>
                    </div>
                    @elseif($track->status == 2)
                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <div class="progress-bar bg-warning"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        <div class="progress-bar bg-primary"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <div class="progress-bar bg-info"></div>
                    </div>
                    @elseif($track->status == 3)
                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <div class="progress-bar bg-warning"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment two" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        <div class="progress-bar bg-primary"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment three" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <div class="progress-bar bg-info"></div>
                    </div>
                    <div class="progress" role="progressbar" aria-label="Segment four" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        <div class="progress-bar bg-success"></div>
                    </div>
                    @else
                    <div class="progress" role="progressbar" aria-label="Segment one" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <div class="progress-bar bg-danger"></div>
                    </div>
                    @endif
                </div>
                <br>
                @if($track->status == 0)
                    <h4>{{ __('Note: Your order is being processed') }}</h4>
                @elseif($track->status == 1)
                    <h4>{{ __('Note: Payment acceptance is being processed') }}</h4>
                @elseif($track->status == 2)
                    <h4>{{ __('Note: The package transfer process is complete') }}</h4>
                @elseif($track->status == 3)
                    <h4>{{ __('Note: Order Completed') }}</h4>
                @else
                    <h4>{{ __('Note: The order has been cancelled') }}</h4>
                @endif
            </div>

            <div class="col-5 offset-lg-1">
                <div class="contact_form_title mb-3"><h4>{{ __('Your Order Details') }}</h4></div>
                <ul class="list-group col-lg-12">
                    <li class="list-group-item"><b>{{ __('Payment Type') }}:</b> <span class="float-end">{{$track->payment_type}}</span> </li>
                    <li class="list-group-item"><b>{{ __('Transaction ID') }}:</b> <span class="float-end">{{$track->payment_id ? $track->payment_id : '-'}}</span> </li>
                    <li class="list-group-item"><b>{{ __('Balance ID') }}:</b> <span class="float-end">{{$track->balance_transaction ? $track->balance_transaction : '-'}}</span> </li>
                    <li class="list-group-item"><b>{{ __('Subtotal') }}:</b> <span class="float-end">{{$track->subtotal}}$</span></li>
                    <li class="list-group-item"><b>{{ __('Shipping') }}:</b> <span class="float-end">{{$track->shipping}}$</span></li>
                    <li class="list-group-item"><b>{{ __('Vat') }}:</b> <span class="float-end">{{$track->vat}}$</span></li>
                    <li class="list-group-item"><b>{{ __('Total') }}:</b> <span class="float-end">{{$track->total}}$</span></li>
                    <li class="list-group-item"><b>{{ __('Month') }}:</b> <span class="float-end">{{$track->month}}</span> </li>
                    <li class="list-group-item"><b>{{ __('Date') }}:</b> <span class="float-end">{{$track->date}}</span> </li>
                    <li class="list-group-item"><b>{{ __('Year') }}:</b> <span class="float-end">{{$track->year}}</span> </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection