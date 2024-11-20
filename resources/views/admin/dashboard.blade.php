@extends('layouts.master')
@section('currentPage')
Dashboard
@endsection
@section('content')
<div class="row">
  <div class="col-xxl-8 d-flex align-items-stretch">
    <div class="card w-100 overflow-hidden rounded-4">
      <div class="card-body position-relative p-4">
        <div class="row">
          <div class="col-12 col-sm-7">
            <div class="d-flex align-items-center gap-3 mb-5">
              <img src="{{theme('assets/images/user.png')}}" class="rounded-circle bg-grd-info p-1" width="60"
                height="60" alt="user">
              <div class="">
                <p class="mb-0 fw-semibold">Welcome back</p>
                <h4 class="fw-semibold mb-0 fs-4 mb-0">Muhammad Haris</h4>
              </div>
            </div>
            <div class="d-flex align-items-center gap-5">
              <div class="">
                <h4 class="mb-1 fw-semibold d-flex align-content-center">1200<i
                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                </h4>
                <p class="mb-3">Total Members</p>
              </div>
              <div class="vr"></div>
              <div class="">
                <h4 class="mb-1 fw-semibold d-flex align-content-center">12<i
                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                </h4>
                <p class="mb-3">Upcoming Renewels <i class="bi bi-info-circle" data-bs-toggle="tooltip"
                    data-bs-placement="top" title="Number of users with upcoming renewals within the next 7 days."></i>
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-5">
            <div class="welcome-back-img pt-4">
              <img src="{{theme('assets/images/gallery/welcome-back-3.png')}}" height="180" alt="">
            </div>
          </div>
        </div>
        <!--end row-->
      </div>
    </div>
  </div>
  <div class="col-xxl-4">
    <div class="row">
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card w-100 rounded-4" style="height: 120px">
          <div class="card-body h-100">
            <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
              <div class="">
                <h5 class="mb-0">Total Members</h5>
              </div>
            </div>
            <div class="d-flex align-items-end justify-content-end" style="height: 70%">
              <h1 class="display-6 m-0 fw-bold text-success">220</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card w-100 rounded-4" style="height: 120px">
          <div class="card-body h-100">
            <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
              <div class="">
                <h5 class="mb-0">Active Members</h5>
              </div>
            </div>
            <div class="d-flex align-items-end justify-content-end" style="height: 70%">
              <h1 class="display-6 m-0 fw-bold" style="color: #ff841b;">180</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card w-100 rounded-4" style="height: 120px">
          <div class="card-body h-100">
            <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
              <div class="">
                <h5 class="mb-0">Expired Members</h5>
              </div>
            </div>
            <div class="d-flex align-items-end justify-content-end" style="height: 70%">
              <h1 class="display-6 m-0 fw-bold text-danger">20</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card w-100 rounded-4" style="height: 120px">
          <div class="card-body h-100">
            <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
              <div class="">
                <h5 class="mb-0">Upcoming Renewels</h5>
              </div>
            </div>
            <div class="d-flex align-items-end justify-content-end" style="height: 70%">
              <h1 class="display-6 m-0 fw-bold text-info">18</h1>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
@push('scripts')
<script>
  $(document).ready(function() {
			var table = $('#recent-renewels').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#recent-renewels_wrapper .col-md-6:eq(0)' );
		} );
</script>
@endpush