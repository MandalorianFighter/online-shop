@extends('layouts.app')

@section('content')
@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
@endpush

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                {{ Form::model(auth()->user(), ['route' => ['profile.update', auth()->user()], 'method' => 'PUT', 'files' => true ]) }}
                <div class="mb-3 row">
                {{ Form::label('name', __('User Name'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                    <div class="col-md-6">
                        {{ Form::text('name', auth()->user()->name, ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('User Name'), 'required']) }}
                        @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                {{ Form::label('phone', __('User Phone'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                    <div class="col-md-6">
                        {{ Form::text('phone', auth()->user()->phone, ['class' => 'form-control'. ($errors->has('phone') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('User Phone'), 'required']) }}
                        @error('phone')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                {{ Form::label('email', __('User Email'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                    <div class="col-md-6">
                        {{ Form::email('email', auth()->user()->email, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('User Email'), 'required']) }}
                        @error('email')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                {{ Form::label('avatar', __('User Avatar'), ['class' => 'col-md-4 col-form-label text-md-right']) }}

                    <div class="col-md-6">
                        {{ Form::file('avatar', ['class' => 'form-control'. ($errors->has('avatar') ? ' is-invalid' : null), 'autocomplete' => false]) }}
                        @error('avatar')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-1 row">
                    <div class="col-md-6 offset-md-4">
                        {{ Form::submit(__('Update Info'), ['class' => 'btn btn-primary']) }}
                    </div>
                </div>

                {{ Form::close() }}
                    
                </div>
            </div>
        </div>
        @include('profile.profile_menu')
    </div>
</div>
@endsection