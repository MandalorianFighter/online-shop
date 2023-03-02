@extends('admin.admin_layouts')

@section('admin_content')

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        
        {{ Form::open(['route' => 'admin.pass-reset.update']) }}

        {{ Form::hidden('token', $request->route('token')) }}
        
        <div class="mb-3 text-secondary">
          {{ Form::label('email', 'Email', ['class' => 'form-label']) }}
          {{ Form::email('email', old('email', $request->email), ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'placeholder' => 'Email Address', 'autofocus', 'required']) }}
          @error('email')
          <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div><!-- form-group -->

        <div class="mb-3 text-secondary">
          {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
          {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
          @error('password')
          <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div><!-- form-group -->

        <div class="mb-3 text-secondary">
          {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-label']) }}
          {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password', 'required']) }}
          @error('password_confirmation')
          <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div><!-- form-group -->
        
        <hr>
        {{ Form::submit('Reset Password', ['class' => 'btn btn-info btn-block']) }}
        {{ Form::close() }}

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection