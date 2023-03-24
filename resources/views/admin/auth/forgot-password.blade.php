@extends('admin.admin_layouts')

@section('admin_content')

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        
        {{ Form::open(['route' => 'admin.password.email']) }}
        <div class="form-group text-secondary">
          {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
          {{ Form::email('email', old('email'), ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'autocomplete' => 'email', 'placeholder' => __('Email Address'), 'autofocus', 'required']) }}
          @error('email')
          <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div><!-- form-group -->
        @if (session('status'))
            <div class="mb-4 text-sm text-success-emphasis">
                {{ session('status') }}
            </div>
        @endif
        <hr>
        {{ Form::submit(__('Email Password Reset Link'), ['class' => 'btn btn-info btn-block']) }}
        {{ Form::close() }}

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection
