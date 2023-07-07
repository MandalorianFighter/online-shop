@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

        <div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-1 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">{{ __('Sign In') }}</div>

                        {{ Form::open(['route' => 'login', 'id' => 'contact_form']) }}
                        <div class="mb-3">
                        {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                        {{ Form::email('email', old('email'), ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'autocomplete' => 'email', 'placeholder' => __('Email Address'), 'required']) }}
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        
                        <div class="mb-3">
                        {{ Form::label('password', __('Password'), ['class' => 'form-label']) }}
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Password'), 'autocomplete' => 'password', 'required']) }}
                        @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror                     
                        </div>
                        <hr>
                        {{ Form::submit(__('Sign In'), ['class' => 'btn btn-primary btn-block']) }}
                        {{ Form::close() }}
                        <hr>
                        <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">{{ __('Forgot password?') }}</a>
                        <hr>
                        <a href="{{ route('admin.login') }}" class="tx-info tx-12 d-block mg-t-10">{{ __('Are you Admin?') }}</a>
                        <hr>
                        <div class="d-grid gap-2">
                        <a href="{{route('login.facebook')}}" class="btn btn-primary"><i class="fab fa-facebook-square"></i> {{ __('Login with Facebook') }}</a>
                        <a href="{{route('login.google')}}" class="btn btn-danger"><i class="fab fa-google"></i> {{ __('Login with Google') }}</a>
                        </div>
					</div>
				</div>

                <div class="col-lg-5 offset-lg-1 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">{{ __('Sign Up') }}</div>

                        {{ Form::open(['route' => 'register', 'id' => 'contact_form']) }}
                        <div class="mb-3">
                            {{ Form::label('name', __('Full Name'), ['class' => 'form-label']) }}
                            {{ Form::text('name', old('name'), ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Full Name'), 'required']) }}
                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_phone', __('Phone Number'), ['class' => 'form-label']) }}
                            {{ Form::text('register_phone', old('register_phone'), ['class' => 'form-control'. ($errors->has('register_phone') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Phone Number'), 'required']) }}  
                        @error('register_phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_email', __('Email'), ['class' => 'form-label']) }}
                            {{ Form::email('register_email', old('register_email'), ['class' => 'form-control'. ($errors->has('register_email') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Email'), 'required']) }}   
                        @error('register_email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_password', __('Password'), ['class' => 'form-label']) }}
                            {{ Form::password('register_password', ['class' => 'form-control'. ($errors->has('register_password') ? ' is-invalid' : null), 'autocomplete' => false, 'placeholder' => __('Enter Your Password'), 'required']) }}  
                        @error('register_password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_password_confirmation', __('Confirm Password'), ['class' => 'form-label']) }}
                            {{ Form::password('register_password_confirmation', ['class' => 'form-control'. ($errors->has('register_password_confirmation') ? ' is-invalid' : null), 'placeholder' => __('Confirm Your Password'), 'required']) }}  
                        @error('register_password_confirmation')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <hr>
                        <div class="contact_form_button">
                            {{ Form::submit(__('Sign Up'), ['class' => 'btn btn-primary']) }}
                        </div>
						{{ Form::close() }}

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>
@endsection