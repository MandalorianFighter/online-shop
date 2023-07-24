@extends('admin.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
            <h5>{{ __('Message Details') }}</h5>
            </div><!-- sl-page-title -->
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">{{ __('Message Details') }}
                <div class="d-inline float-end">
                    <a href="{{ route('messages.index') }}" class="btn btn-sm btn-info">{{ __('Return Back') }}</a>
                </div>
                </h6>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">{{ __('Message Details') }}</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name: </th>
                                        <th>{{ $message->name }}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone: </th>
                                        <th>{{ $message->phone }}</th>
                                    </tr>
                                    <tr>
                                        <th>Email: </th>
                                        <th>{{ $message->email }}</th>
                                    </tr>
                                    <tr>
                                        <th>Message: </th>
                                        <th>{{ $message->message }}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>   
                     
                </div>
            
            <div/>
        </div>
    </div><!-- sl-mainpanel -->
@endsection