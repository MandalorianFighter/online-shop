@extends('layouts.app')
@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
@endpush

<div class="contact_form mt-5">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
                <h6 class="card-body-title mt-3 mb-3">{{ __('Order List') }}</h6>
                {!! $dataTable->table(['class' => 'table table-response']) !!}
            </div>
            @include('profile.profile_menu')
        </div>
    </div>
</div>

<!-- Order Tracking Modal -->
<!-- Modal code remains the same -->

<div class="modal fade" id="returnOrderModal" tabindex="-1" aria-labelledby="returnOrderModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="returnOrderModalLabel">{{ __('Return Order') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('order.return') }}" method="post">
			@csrf
			<div class="modal-body">
                <div class="mb-3">
                    <h4>{{ __('Are you sure, you want to return the order?') }}</h4>
                </div>
                <input type="hidden" id="order_id" name="order_id">
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button class="btn btn-danger" type="submit">{{ __('Return') }}</button>
			</div>
		</form>
      </div>
      
    </div>
  </div>
</div>

@endsection

@push('scripts')
{!! $dataTable->scripts(null, ['type' => 'module']) !!}

<script type="module">
    $(document).on('click', '.return-order', function() {
        var order_id = $(this).attr('id');
        $('#order_id').val(order_id);
    });
</script>
@endpush

