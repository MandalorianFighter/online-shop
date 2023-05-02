@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Subscriber List') }}</h5>
        </div><!-- sl-page-title -->

        <livewire:newsletter-table />

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

@endsection