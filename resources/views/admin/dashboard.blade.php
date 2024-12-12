@extends('layouts.master')
@section('currentPage')
Dashboard
@endsection
@section('css')
<style>
  .apexcharts-menu {
    background-color: #333333 !important;
    /* Dark background for better contrast */
    color: #ffffff;
    /* White text for visibility */
    min-width: 130px !important;
  }

  .apexcharts-menu-item {
    text-align: center
  }

  .apexcharts-menu-item:hover {
    color: black;
  }
</style>
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
                <h4 class="mb-1 fw-semibold d-flex align-content-center">{{ $totalCustomers->count() }}<i
                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                </h4>
                <p class="mb-3">Total Members</p>
              </div>
              <div class="vr"></div>
              <div class="">
                <h4 class="mb-1 fw-semibold d-flex align-content-center">{{ $expiringCustomers->count() }}<i
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
            <a href="{{ route('customers.index') }}">
              <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
                <div class="">
                  <h5 class="mb-0">Total Members</h5>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-end" style="height: 70%">
                <h1 class="display-6 m-0 fw-bold text-success">{{ $totalCustomers->count() }}</h1>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card w-100 rounded-4" style="height: 120px">
          <div class="card-body h-100">
            <a href="/active-members">
              <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
                <div class="">
                  <h5 class="mb-0">Active Members</h5>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-end" style="height: 70%">
                <h1 class="display-6 m-0 fw-bold" style="color: #ff841b;">{{ $activeCustomers->count() }}</h1>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card w-100 rounded-4" style="height: 120px">
          <div class="card-body h-100">
            <a href="/expired-members">
              <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
                <div class="">
                  <h5 class="mb-0">Expired Members</h5>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-end" style="height: 70%">
                <h1 class="display-6 m-0 fw-bold text-danger">{{ $expiredCustomers->count() }}</h1>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-3 d-flex align-items-stretch">
        <div class="card w-100 rounded-4" style="height: 120px">
          <div class="card-body h-100">
            <a href="/upcoming-renewal">
              <div class="d-flex align-items-start justify-content-between mb-1" style="height: 30%">
                <div class="">
                  <h5 class="mb-0">Upcoming Renewels</h5>
                </div>
              </div>
              <div class="d-flex align-items-end justify-content-end" style="height: 70%">
                <h1 class="display-6 m-0 fw-bold text-info">{{ $expiringCustomers->count() }}</h1>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="col-xl-12 col-xxl-4 d-flex align-items-stretch">
    <div class="card w-100 rounded-4">
      <div class="card-body">
        <div class="text-center">
          <h4 class="mb-0">Monthly Revenue</h4>
        </div>
        <div class="mt-4" id="monthlyChart"></div>
      </div>
    </div>
  </div>
  <div class="col-xl-12 col-xxl-4 d-flex align-items-stretch">
    <div class="card w-100 rounded-4">
      <div class="card-body">
        <div class="text-center">
          <h4 class="mb-0">Semiannual Revenue</h4>
        </div>
        <div class="mt-4" id="semiAnnualChart"></div>
      </div>
    </div>
  </div>
  <div class="col-xl-12 col-xxl-4 d-flex align-items-stretch">
    <div class="card w-100 rounded-4">
      <div class="card-body">
        <div class="text-center">
          <h4 class="mb-0">Annual Revenue</h4>
        </div>
        <div class="mt-4" id="annualChart"></div>
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
<script>
  $(function () {
  "use strict";

  // Chart for Monthly Revenue
  var options = {
  series: [{
    name: "Revenue",
    data: [4, 10, 12, 17, 25, 30, 40, 55, 68, 55, 14, 90]
  }],
  chart: {
    height: 300,
    type: 'bar',
    sparkline: {
      enabled: false // Set to false to ensure x-axis labels are visible
    },
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 1,
    curve: 'smooth',
    color: ['transparent']
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'dark',
      gradientToColors: ['#7928ca'],
      shadeIntensity: 1,
      type: 'vertical',
    },
  },
  colors: ["#ff0080"],
  plotOptions: {
    bar: {
      horizontal: false,
      borderRadius: 4,
      columnWidth: '45%'
    }
  },
  tooltip: {
    theme: "dark",
    x: {
      show: true // Ensure tooltip displays the x-axis category (month)
    },
    y: {
      formatter: function (value) {
        return "$" + value; // Prefix the value with a dollar sign
      }
    }
  },
  xaxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    labels: {
      style: {
        colors: '#ffffff', // Adjust this for better visibility
        fontSize: '12px'
      }
    }
  },
  yaxis: {
    labels: {
      style: {
        colors: '#ffffff', // Adjust this for better visibility
        fontSize: '12px'
      }
    },
    title: {
      text: 'Revenue ($)', // Optional: Add a title to the y-axis
      style: {
        color: '#ffffff',
        fontSize: '14px'
      }
    }
  }
};

var chart = new ApexCharts(document.querySelector("#monthlyChart"), options);
chart.render();




// chart for semi annual

var options = {
  series: [{
    name: "Revenue",
    data: [4, 10,]
  }],
  chart: {
    height: 300,
    type: 'bar',
    sparkline: {
      enabled: false // Set to false to ensure x-axis labels are visible
    },
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 1,
    curve: 'smooth',
    color: ['transparent']
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'dark',
      gradientToColors: ['#7928ca'],
      shadeIntensity: 1,
      type: 'vertical',
    },
  },
  colors: ["#ff0080"],
  plotOptions: {
    bar: {
      horizontal: false,
      borderRadius: 4,
      columnWidth: '45%'
    }
  },
  tooltip: {
    theme: "dark",
    x: {
      show: true // Ensure tooltip displays the x-axis category (month)
    },
    y: {
      formatter: function (value) {
        return "$" + value; // Prefix the value with a dollar sign
      }
    }
  },
  xaxis: {
    categories: ['Jan-Jun', 'Jul-Dec',],
    labels: {
      style: {
        colors: '#ffffff', // Adjust this for better visibility
        fontSize: '12px'
      }
    }
  },
  yaxis: {
    labels: {
      style: {
        colors: '#ffffff', // Adjust this for better visibility
        fontSize: '12px'
      }
    },
    title: {
      text: 'Revenue ($)', // Optional: Add a title to the y-axis
      style: {
        color: '#ffffff',
        fontSize: '14px'
      }
    }
  }
};

var chart = new ApexCharts(document.querySelector("#semiAnnualChart"), options);
chart.render();


// chart for yearly
var options = {
  series: [{
    name: "Revenue",
    data: [4, 10,]
  }],
  chart: {
    height: 300,
    type: 'bar',
    sparkline: {
      enabled: false // Set to false to ensure x-axis labels are visible
    },
    zoom: {
      enabled: false
    }
  },
  dataLabels: {
    enabled: false
  },
  stroke: {
    width: 1,
    curve: 'smooth',
    color: ['transparent']
  },
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'dark',
      gradientToColors: ['#7928ca'],
      shadeIntensity: 1,
      type: 'vertical',
    },
  },
  colors: ["#ff0080"],
  plotOptions: {
    bar: {
      horizontal: false,
      borderRadius: 4,
      columnWidth: '45%'
    }
  },
  tooltip: {
    theme: "dark",
    x: {
      show: true // Ensure tooltip displays the x-axis category (month)
    },
    y: {
      formatter: function (value) {
        return "$" + value; // Prefix the value with a dollar sign
      }
    }
  },
  xaxis: {
    categories: ['2024', '2025',],
    labels: {
      style: {
        colors: '#ffffff', // Adjust this for better visibility
        fontSize: '12px'
      }
    }
  },
  yaxis: {
    labels: {
      style: {
        colors: '#ffffff', // Adjust this for better visibility
        fontSize: '12px'
      }
    },
    title: {
      text: 'Revenue ($)', // Optional: Add a title to the y-axis
      style: {
        color: '#ffffff',
        fontSize: '14px'
      }
    }
  }
};

var chart = new ApexCharts(document.querySelector("#annualChart"), options);
chart.render();



});
</script>
@endpush