@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Reports - This Month') }}</h5>
        </div><!-- sl-page-title -->

        
        @livewire('report-this-month')
        
        </div>

    </div><!-- sl-mainpanel -->
@endsection