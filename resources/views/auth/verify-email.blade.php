@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">


<div class="contact_form">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-5 offset-lg-1 sign-form">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">{{ __('Email Verify') }}</div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                <button type="submit" class="btn btn-primary btn-block">{{ __('Resend Verification Email') }}</button>
                </div>
            </form>

            <hr>
            <div>
                <p>
                    <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    {{ __('Edit Profile') }}</a>
                </p>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="btn btn-danger">{{ __('Log Out') }}</button>
                </form>
            </div>
        </div>

            </div>
        </div>
            </div>
        </div>        
    </div>

@endsection
