@extends('admin.admin_layouts')

@section('admin_content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>{{ __('Coupon List') }}</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{ __('Coupon List') }}
          <a href="" class="btn btn-sm btn-warning" style="float:right;" data-bs-toggle="modal" data-bs-target="#modaldemo3">{{ __('Add New') }}</a>
          </h6>

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">{{ __('Coupon Code') }}</th>
                  <th class="wd-15p">{{ __('Discount Percentage') }}</th>
                  <th class="wd-20p">{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($coupons as $key => $coupon)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $coupon->coupon }}</td>
                  <td>{{ $coupon->discount }}%</td>
                  <td>
                    <a href="{{ route('coupons.edit', $coupon) }}" class="btn btn-sm btn-info">{{ __('Edit') }}</a>
                    {{ Form::model($coupon, ['route' => ['coupons.destroy', $coupon], 'method' => 'DELETE', 'style' => 'display:inline-block;']) }}
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">{{ __('Add Coupon') }}</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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

              {{ Form::open(['route' => 'coupons.store']) }}
              <div class="modal-body pd-20">
                <div class="mb-3">
                  {{ Form::label('coupon', __('Coupon Code'), ['class' => 'form-label']) }}
                  {{ Form::text('coupon', null, ['class' => 'form-control', 'placeholder' => __('Coupon Code')]) }}
                </div>

                <div class="mb-3">
                  {{ Form::label('discount', __('Coupon Discount (%)'), ['class' => 'form-label']) }}
                  {{ Form::text('discount', null, ['class' => 'form-control', 'placeholder' => __('Coupon Discount')]) }}
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