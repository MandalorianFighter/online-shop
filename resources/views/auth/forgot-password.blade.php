@extends('layouts.app')

@section('content')

<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-1 sign-form">
					<div class="contact_form_container">

                        {{ Form::open(['route' => 'password.email', 'id' => 'contact_form']) }}
                        <div class="mb-4 text-sm text-secondary">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </div>
                        @if (session('status'))
                            <div class="mb-4 text-sm text-success-emphasis">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="mb-3 text-secondary">
                        {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                        {{ Form::email('email', old('email'), ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'autocomplete' => 'email', 'placeholder' => __('Email Address'), 'autofocus', 'required']) }}
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <hr>
                        {{ Form::submit(__('Email Password Reset Link'), ['class' => 'btn btn-primary btn-block']) }}
                        {{ Form::close() }}
                        
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection