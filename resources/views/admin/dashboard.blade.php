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
  <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
    <div class="card w-100 rounded-4">
      <div class="card-body">
        <div class="text-center">
          <h6 class="mb-0">Monthly Revenue</h6>
        </div>
        <div class="mt-4" id="chart5"></div>
        <p>Average monthly sale for every author</p>
        <div class="d-flex align-items-center gap-3 mt-4">
          <div class="">
            <h1 class="mb-0 text-primary">68.9%</h1>
          </div>
          <div class="d-flex align-items-center align-self-end">
            <p class="mb-0 text-success">34.5%</p>
            <span class="material-icons-outlined text-success">expand_less</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
    <div class="card w-100 rounded-4">
      <div class="card-body">
        <div class="d-flex flex-column gap-3">
          <div class="d-flex align-items-start justify-content-between">
            <div class="">
              <h5 class="mb-0">Device Type</h5>
            </div>
            <div class="dropdown">
              <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                <span class="material-icons-outlined fs-5">more_vert</span>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
              </ul>
            </div>
          </div>
          <div class="position-relative">
            <div class="piechart-legend">
              <h2 class="mb-1">68%</h2>
              <h6 class="mb-0">Total Views</h6>
            </div>
            <div id="chart6"></div>
          </div>
          <div class="d-flex flex-column gap-3">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                  class="material-icons-outlined fs-6 text-primary">desktop_windows</span>Desktop</p>
              <div class="">
                <p class="mb-0">35%</p>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                  class="material-icons-outlined fs-6 text-danger">tablet_mac</span>Tablet</p>
              <div class="">
                <p class="mb-0">48%</p>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 d-flex align-items-center gap-2 w-25"><span
                  class="material-icons-outlined fs-6 text-success">phone_android</span>Mobile</p>
              <div class="">
                <p class="mb-0">27%</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xxl-4">
    <div class="row">
      <div class="col-md-6 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-1">
              <div class="">
                <h5 class="mb-0">82.7K</h5>
                <p class="mb-0">Total Clicks</p>
              </div>
              <div class="dropdown">
                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                  data-bs-toggle="dropdown">
                  <span class="material-icons-outlined fs-5">more_vert</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                  <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                  <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                </ul>
              </div>
            </div>
            <div class="chart-container2">
              <div id="chart3"></div>
            </div>
            <div class="text-center">
              <p class="mb-0 font-12"><span class="text-success me-1">12.5%</span> from last month</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
          <div class="card-body">
            <div class="d-flex align-items-start justify-content-between mb-1">
              <div class="">
                <h5 class="mb-0">68.4K</h5>
                <p class="mb-0">Total Views</p>
              </div>
              <div class="dropdown">
                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                  data-bs-toggle="dropdown">
                  <span class="material-icons-outlined fs-5">more_vert</span>
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                  <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                  <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                </ul>
              </div>
            </div>
            <div class="chart-container2">
              <div id="chart4"></div>
            </div>
            <div class="text-center">
              <p class="mb-0 font-12">35K users increased from last month</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card rounded-4">
      <div class="card-body">
        <div class="d-flex align-items-center gap-3 mb-2">
          <div class="">
            <h3 class="mb-0">85,247</h3>
          </div>
          <div class="flex-grow-0">
            <p class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
              <span class="material-icons-outlined fs-6">arrow_downward</span>23.7%
            </p>
          </div>
        </div>
        <p class="mb-0">Total Accounts</p>
        <div id="chart7"></div>
      </div>
    </div>
  </div>
  <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
    <div class="card w-100 rounded-4">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between mb-3">
          <div class="">
            <h6 class="mb-0 fw-bold">Campaign Stats</h6>
          </div>
          <div class="dropdown">
            <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
              <span class="material-icons-outlined fs-5">more_vert</span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="javascript:;">Action</a></li>
              <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
              <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
            </ul>
          </div>
        </div>

        <ul class="list-group list-group-flush">
          <li class="list-group-item px-0 bg-transparent">
            <div class="d-flex align-items-center gap-3">
              <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-primary">
                <span class="material-icons-outlined text-white">calendar_today</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">Campaigns</h6>
              </div>
              <div class="d-flex align-items-center gap-3">
                <p class="mb-0">54</p>
                <p class="mb-0 fw-bold text-success">28%</p>
              </div>
            </div>
          </li>
          <li class="list-group-item px-0 bg-transparent">
            <div class="d-flex align-items-center gap-3">
              <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-success">
                <span class="material-icons-outlined text-white">email</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">Emailed</h6>
              </div>
              <div class="d-flex align-items-center gap-3">
                <p class="mb-0">245</p>
                <p class="mb-0 fw-bold text-danger">15%</p>
              </div>
            </div>
          </li>
          <li class="list-group-item px-0 bg-transparent">
            <div class="d-flex align-items-center gap-3">
              <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-branding">
                <span class="material-icons-outlined text-white">open_in_new</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">Opened</h6>
              </div>
              <div class="d-flex align-items-center gap-3">
                <p class="mb-0">54</p>
                <p class="mb-0 fw-bold text-success">30.5%</p>
              </div>
            </div>
          </li>
          <li class="list-group-item px-0 bg-transparent">
            <div class="d-flex align-items-center gap-3">
              <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-warning">
                <span class="material-icons-outlined text-white">ads_click</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">Clicked</h6>
              </div>
              <div class="d-flex align-items-center gap-3">
                <p class="mb-0">859</p>
                <p class="mb-0 fw-bold text-danger">34.6%</p>
              </div>
            </div>
          </li>
          <li class="list-group-item px-0 bg-transparent">
            <div class="d-flex align-items-center gap-3">
              <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-info">
                <span class="material-icons-outlined text-white">subscriptions</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">Subscribed</h6>
              </div>
              <div class="d-flex align-items-center gap-3">
                <p class="mb-0">24,758</p>
                <p class="mb-0 fw-bold text-success">53%</p>
              </div>
            </div>
          </li>
          <li class="list-group-item px-0 bg-transparent">
            <div class="d-flex align-items-center gap-3">
              <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-danger">
                <span class="material-icons-outlined text-white">inbox</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">Spam Message</h6>
              </div>
              <div class="d-flex align-items-center gap-3">
                <p class="mb-0">548</p>
                <p class="mb-0 fw-bold text-danger">47%</p>
              </div>
            </div>
          </li>
          <li class="list-group-item px-0 bg-transparent">
            <div class="d-flex align-items-center gap-3">
              <div class="wh-42 d-flex align-items-center justify-content-center rounded-3 bg-grd-deep-blue">
                <span class="material-icons-outlined text-white">visibility</span>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">Views Mails</h6>
              </div>
              <div class="d-flex align-items-center gap-3">
                <p class="mb-0">9845</p>
                <p class="mb-0 fw-bold text-success">68%</p>
              </div>
            </div>
          </li>
        </ul>

      </div>
    </div>
  </div>
  <div class="col-xl-6 col-xxl-4 d-flex align-items-stretch">
    <div class="card w-100 rounded-4">
      <div class="card-body">
        <div id="chart8"></div>
        <div class="d-flex align-items-center gap-3 mt-4">
          <div class="">
            <h1 class="mb-0">36.7%</h1>
          </div>
          <div class="d-flex align-items-center align-self-end gap-2">
            <span class="material-icons-outlined text-success">trending_up</span>
            <p class="mb-0 text-success">34.5%</p>
          </div>
        </div>
        <p class="mb-4">Visitors Growth</p>
        <div class="d-flex flex-column gap-3">
          <div class="">
            <p class="mb-1">Cliks <span class="float-end">2589</span></p>
            <div class="progress" style="height: 5px;">
              <div class="progress-bar bg-grd-primary" style="width: 65%"></div>
            </div>
          </div>
          <div class="">
            <p class="mb-1">Likes <span class="float-end">6748</span></p>
            <div class="progress" style="height: 5px;">
              <div class="progress-bar bg-grd-warning" style="width: 55%"></div>
            </div>
          </div>
          <div class="">
            <p class="mb-1">Upvotes <span class="float-end">9842</span></p>
            <div class="progress" style="height: 5px;">
              <div class="progress-bar bg-grd-info" style="width: 45%"></div>
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