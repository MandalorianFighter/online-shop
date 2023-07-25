@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Process Delivery Orders') }}</h5>
        </div><!-- sl-page-title -->

        
        @livewire('process-delivery-orders')
        
        </div>

    </div><!-- sl-mainpanel -->
@endsection