@extends('admin.admin_layouts')

@section('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">{{ __('Admin Section') }}</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('New Admin') }}
            <a href="{{ route('roles.index') }}" class="btn btn-success btn-sm pull-right">{{ __('All Users') }}</a>
          </h6>

          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif
          <p class="mg-b-20 mg-sm-b-30">{{ __('New Admin Add Form') }}</p>

          {{ Form::open(['route' => 'roles.store']) }}

          <div class="form-layout">
            <div class="row mg-b-25">
      
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('name]', __('Name') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter User Name'), 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->
            
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('phone', __('Phone') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('Enter User Phone'), 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('email', __('Email') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('Enter User Email'), 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('password', __('Password') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Password'), 'required' => 'required']) }}
                </div>
            </div><!-- col-4 -->
              </div>

          </div><!-- row -->
            <hr>
            <div class="row">

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('category', 0) }}
              {{ Form::checkbox('category', 1) }}
              <span>{{ __('Category') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('coupon', 0) }}
              {{ Form::checkbox('coupon', 1) }}
              <span>{{ __('Coupons') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('product', 0) }}
              {{ Form::checkbox('product', 1) }}
              <span>{{ __('Products') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('blog', 0) }}
              {{ Form::checkbox('blog', 1) }}
              <span>{{ __('Blog') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('orders', 0) }}
              {{ Form::checkbox('orders', 1) }}
              <span>{{ __('Orders') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('other', 0) }}
              {{ Form::checkbox('other', 1) }}
              <span>{{ __('Other') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('report', 0) }}
              {{ Form::checkbox('report', 1) }}
              <span>{{ __('Reports') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('role', 0) }}
              {{ Form::checkbox('role', 1) }}
              <span>{{ __('User Roles') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('return_orders', 0) }}
              {{ Form::checkbox('return_orders', 1) }}
              <span>{{ __('Return Orders') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('contact', 0) }}
              {{ Form::checkbox('contact', 1) }}
              <span>{{ __('Contact') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('comment', 0) }}
              {{ Form::checkbox('comment', 1) }}
              <span>{{ __('Comments') }}</span>
            </label>
            </div><!-- col-4 -->

            <div class="col-lg-4">
            <label class="ckbox">
              {{ Form::hidden('setting', 0) }}
              {{ Form::checkbox('setting', 1) }}
              <span>{{ __('Settings') }}</span>
            </label>
            </div><!-- col-4 -->

            </div>

            <hr>

            <div class="form-layout-footer">
            {{ Form::submit(__('Submit'), ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}





        
      </div><!-- row -->

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



@endsection