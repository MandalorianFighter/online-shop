@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
@endpush


<!-- Contact Info -->

<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="{{ asset('frontend/images/contact_1.png') }}" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">{{ __('Phone') }}</div>
								<div class="contact_info_text">{{ $contact->phone_one }}</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="{{ asset('frontend/images/contact_2.png') }}" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">{{ __('Email') }}</div>
								<div class="contact_info_text">{{ $contact->company_email }}</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="{{ asset('frontend/images/contact_3.png') }}" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">{{ __('Address') }}</div>
								<div class="contact_info_text">{{ $contact->company_address }}</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">{{ __('Get in Touch') }}</div>

						<form method="post" action="{{ route('contact.message') }}" id="contact_form">
                            @csrf
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" id="contact_form_name" class="contact_form_name input_field" name="name" placeholder="{{ __('Your name') }}" required="required" data-error="{{ __('Name is required.') }}">
								<input type="email" id="contact_form_email" class="contact_form_email input_field" name="email" placeholder="{{ __('Your email') }}" required="required" data-error="{{ __('Email is required.') }}">
								<input type="text" id="contact_form_phone" class="contact_form_phone input_field" name="phone" placeholder="{{ __('Your phone number') }}">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message" name="message" rows="4" placeholder="{{ __('Message') }}" required="required" data-error="{{ __('Please, write us a message.') }}"></textarea>
							</div> 
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">{{ __('Send Message') }}</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

@endsection