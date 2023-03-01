@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

        <div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-1 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Sign In</div>

                        {{ Form::open(['route' => 'login', 'id' => 'contact_form']) }}
                        <div class="mb-3">
                        {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
                        {{ Form::email('email', old('email'), ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'autocomplete' => 'email', 'placeholder' => 'Email Address', 'required']) }}
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        
                        <div class="mb-3">
                        {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'password', 'required']) }}
                        @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror                     
                        </div>
                        <hr>
                        {{ Form::submit('Sign In', ['class' => 'btn btn-primary btn-block']) }}
                        {{ Form::close() }}
                        <hr>
                        <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                        <hr>
                        <a href="{{ route('admin.login') }}" class="tx-info tx-12 d-block mg-t-10">Are you Admin?</a>
                        <hr>
                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"><i class="fab fa-facebook-square"></i> Login with Facebook</button>
                        <button type="submit" class="btn btn-danger"><i class="fab fa-google"></i> Login with Google</button>
                        </div>
					</div>
				</div>

                <div class="col-lg-5 offset-lg-1 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Sign Up</div>

                        {{ Form::open(['route' => 'register', 'id' => 'contact_form']) }}
                        <div class="mb-3">
                            {{ Form::label('name', 'Full Name', ['class' => 'form-label']) }}
                            {{ Form::text('name', old('name'), ['class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null), 'autocomplete' => 'off', 'placeholder' => 'Enter Your Full Name', 'required']) }}
                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_phone', 'Phone Number', ['class' => 'form-label']) }}
                            {{ Form::text('register_phone', old('register_phone'), ['class' => 'form-control'. ($errors->has('register_phone') ? ' is-invalid' : null), 'autocomplete' => 'off', 'placeholder' => 'Enter Your Phone Number', 'required']) }}  
                        @error('register_phone')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_email', 'Email', ['class' => 'form-label']) }}
                            {{ Form::email('register_email', old('register_email'), ['class' => 'form-control'. ($errors->has('register_email') ? ' is-invalid' : null), 'autocomplete' => 'off', 'placeholder' => 'Enter Your Email', 'required']) }}   
                        @error('register_email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_password', 'Password', ['class' => 'form-label']) }}
                            {{ Form::password('register_password', ['class' => 'form-control'. ($errors->has('register_password') ? ' is-invalid' : null), 'autocomplete' => 'off', 'placeholder' => 'Enter Your Password', 'required']) }}  
                        @error('register_password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                        <div class="mb-3">
                            {{ Form::label('register_password_confirmation', 'Confirm Password', ['class' => 'form-label']) }}
                            {{ Form::password('register_password_confirmation', ['class' => 'form-control'. ($errors->has('register_password_confirmation') ? ' is-invalid' : null), 'placeholder' => 'Confirm Your Password', 'required']) }}  
                        @error('register_password_confirmation')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <hr>
                        <div class="contact_form_button">
                            {{ Form::submit('Sign Up', ['class' => 'btn btn-primary']) }}
                        </div>
						{{ Form::close() }}

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>
@endsection