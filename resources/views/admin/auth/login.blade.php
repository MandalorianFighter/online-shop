@extends('admin.admin_layouts')

@section('admin_content')

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Starlight <span class="tx-info tx-normal">Admin</span></div>
        <div class="tx-center mg-b-60">Ecommerce Project</div>
        
        {{ Form::open(['route' => 'admin.login']) }}
        <div class="form-group">
          {{ Form::email('email', old('email'), ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null), 'autocomplete' => 'email', 'placeholder' => 'Email Address', 'autofocus', 'required']) }}
          @error('email')
          <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div><!-- form-group -->
        <div class="form-group">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) }}
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div><!-- form-group -->
        <hr>
        <a href="{{ route('admin.password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        <hr>
        {{ Form::submit('Sign In', ['class' => 'btn btn-info btn-block']) }}
        {{ Form::close() }}

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection