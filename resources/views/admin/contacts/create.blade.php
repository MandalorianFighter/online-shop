@extends('admin.admin_layouts')

@section('admin_content')

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Starlight</a>
        <span class="breadcrumb-item active">{{ __('Website Company Info') }}</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('Company Info') }}</h6>

          @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif
          <p class="mg-b-20 mg-sm-b-30">{{ __('Website Company Info Form') }}</p>

          {{ Form::open(['route' => 'contacts.store']) }}

          <div class="form-layout">
            <div class="row mg-b-25">
      
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('phone_one', __('Phone One') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('phone_one', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->
            
              <div class="col-lg-6">
                <div class="form-group">
                {!! Html::decode(Form::label('phone_two', __('Phone Two') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('phone_two', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('company_email', __('Email') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::email('company_email', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('company_name', __('Company Name') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('company_name', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label('company_address', __('Company Address') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('company_address', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('fb', __('Facebook') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('fb', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('youtube', __('YouTube') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('youtube', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('instagram', __('Instagram') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('instagram', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('twitter', __('Twitter') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('twitter', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <hr>

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('vat', __('VAT') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('vat', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('shipping_charge', __('Shipping Charge') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('shipping_charge', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              </div>

          </div><!-- row -->
            <hr>
            <div class="form-layout-footer">
            {{ Form::submit(__('Create'), ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}
        
      </div><!-- row -->

</div><!-- sl-mainpanel -->

@endsection