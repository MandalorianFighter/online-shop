@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Reports - Search') }}</h5>
        </div>

        
        @livewire('report-filter')
        
        </div>

    </div>

@endsection