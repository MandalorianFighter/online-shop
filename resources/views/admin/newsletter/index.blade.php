@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Subscriber List') }}</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('Subscriber List') }}
          <!-- <a href="" class="btn btn-sm btn-warning" style="float:right;" data-toggle="modal" data-target="#modaldemo3">Add New</a> -->
          {{ Form::open(['route' => ['newsletters.store'], 'method' => 'POST', 'style' => 'display:inline-block; float:right;']) }}
          {{ Form::submit(__('Delete Chosen'), ['class' => 'btn btn-sm btn-warning', 'id' => 'delete']) }}
          {{ Form::close() }}
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">{{ __('Email') }}</th>
                  <th class="wd-15p">{{ __('Subscribing Time') }}</th>
                  <th class="wd-20p">{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($subscribers as $key => $subscriber)
                <tr>
                  <td>{{ Form::checkbox('name', 'value') }} {{ $key + 1 }}</td>
                  <td>{{ $subscriber->email }}</td>
                  <td>{{ \Carbon\Carbon::parse($subscriber->created_at)->diffForHumans() }}</td>
                  <td>
                    {{ Form::model($subscriber, ['route' => ['newsletters.destroy', $subscriber], 'method' => 'DELETE', 'style' => 'display:inline-block;']) }}
                    {{ Form::submit(__('Delete'), ['class' => 'btn btn-sm btn-danger', 'id' => 'delete']) }}
                    {{ Form::close() }}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Add Category') }}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              @if ($errors->any())
                  <div class="alert alert-danger">
                      
                          @foreach ($errors->all() as $error)
                              <p>Error: {{ $error }}</p>
                          @endforeach
                
                  </div>
              @endif

              {{ Form::open(['route' => 'newsletters.store']) }}
              <div class="modal-body pd-20">
                <div class="mb-3">
                  {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                  {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('Email')]) }}
                </div>
              </div><!-- modal-body -->

              <div class="modal-footer">
                {{ Form::submit(__('Submit'), ['class' => 'btn btn-info pd-x-20']) }}
                {{ Form::button(__('Close'), ['class' => 'btn btn-secondary pd-x-20', 'data-bs-dismiss' => 'modal']) }}
              </div>
              {{ Form::close() }}
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection