@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Reports - Today Orders') }}</h5>
        </div><!-- sl-page-title -->

        
        @livewire('report-today-orders')
        
        </div>

    </div><!-- sl-mainpanel -->
@endsection