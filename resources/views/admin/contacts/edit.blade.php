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

          {{ Form::model($contact, ['route' => ['contacts.update', $contact], 'method' => 'PUT']) }}

          <div class="form-layout">
            <div class="row mg-b-25">
      
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('phone_one', __('Phone One') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('phone_one', $contact->phone_one, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->
            
              <div class="col-lg-6">
                <div class="form-group">
                {!! Html::decode(Form::label('phone_two', __('Phone Two') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('phone_two', $contact->phone_two, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('company_email', __('Email') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::email('company_email', $contact->company_email, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('company_name', __('Company Name') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('company_name', $contact->company_name, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  {!! Html::decode(Form::label('company_address', __('Company Address') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('company_address', $contact->company_address, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('fb', __('Facebook') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('fb', $contact->fb, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('youtube', __('YouTube') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('youtube', $contact->youtube, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('instagram', __('Instagram') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('instagram', $contact->instagram, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  {!! Html::decode(Form::label('twitter', __('Twitter') . ': <span class="tx-danger">*</span>', ['class' => 'form-control-label'])) !!}
                  {{ Form::text('twitter', $contact->twitter, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div><!-- col-4 -->

              </div>

          </div><!-- row -->
            <hr>
            <div class="form-layout-footer">
            {{ Form::submit(__('Update'), ['class' => 'btn btn-info mg-r-5']) }}
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->

        {{ Form::close() }}
        
      </div><!-- row -->

</div><!-- sl-mainpanel -->



@endsection