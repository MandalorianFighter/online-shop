@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                {{ Form::model(auth()->user(), ['route' => ['password.change.update', auth()->user()], 'method' => 'PUT']) }}
                <div class="mb-3 row">
                {{ Form::label('current_password', __('Current Password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                    <div class="col-md-6">
                        {{ Form::password('current_password', ['class' => 'form-control'. ($errors->has('current_password') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Current Password'), 'required']) }}
                        @error('current_password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                {{ Form::label('password', __('New Password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                    <div class="col-md-6">
                        {{ Form::password('password', ['class' => 'form-control'. ($errors->has('password') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('New Password'), 'required']) }}
                        @error('password')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    {{ Form::label('password_confirmation', __('Confirm New Password'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                    <div class="col-md-6">
                        {{ Form::password('password_confirmation', ['class' => 'form-control'. ($errors->has('password_confirmation') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Confirm New Password'), 'required']) }}
                        @error('password_confirmation')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        {{ Form::submit(__('Change Password'), ['class' => 'btn btn-primary']) }}
                    </div>
                </div>

                {{ Form::close() }}
                    
                </div>
            </div>
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
@endsection

