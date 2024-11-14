<!doctype html>
<html lang="en" data-bs-theme="blue-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Crypto Signals</title>
  <!--favicon-->
  <link rel="icon" href="{{theme('assets/images/favicon-32x32.png')}}" type="image/png">
  <!-- loader-->
  <link href="{{theme('assets/css/pace.min.css')}}" rel="stylesheet">
  <script src="{{theme('assets/js/pace.min.js')}}"></script>

  <!--plugins-->
  <link href="{{theme('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{theme('assets/plugins/metismenu/metisMenu.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{theme('assets/plugins/metismenu/mm-vertical.css')}}">
  <link rel="stylesheet" type="text/css" href="{{theme('assets/plugins/simplebar/css/simplebar.css')}}">
  <link href="{{theme('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  <!--bootstrap css-->
  <link href="{{theme('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="{{theme('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
  <link href="{{theme('sass/main.css')}}" rel="stylesheet">
  <link href="{{theme('sass/dark-theme.css')}}" rel="stylesheet">
  <link href="{{theme('sass/blue-theme.css')}}" rel="stylesheet">
  <link href="{{theme('sass/semi-dark.css')}}" rel="stylesheet">
  <link href="{{theme('sass/bordered-theme.css')}}" rel="stylesheet">
  <link href="{{theme('sass/responsive.css')}}" rel="stylesheet">
  @yield('css')
</head>

<body>
  <!--start top header-->
  @include('layouts.includes.header')
  <!--end top header-->

  <!--start sidebar-->
  @include('layouts.includes.sidebar')
  <!--end sidebar-->
  <main class="main-wrapper">
    <div class="main-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        @if (Request::is('/'))
        <div class="breadcrumb-title pe-3">Dashboard</div>
        @endif
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item active d-flex gap-2 align-items-center" aria-current="page"><i
                  class="material-icons-outlined">arrow_right</i>@yield('currentPage')</li>
            </ol>
          </nav>
        </div>
      </div>
      <!--end breadcrumb-->

      <!-- start dynamic content -->
      @yield('content')
      <!-- end dynamic content -->

    </div>
  </main>
  <!--start overlay-->
  <div class="overlay btn-toggle"></div>
  <!--end overlay-->

  <!--start footer-->
  @include('layouts.includes.footer')
  <!--end footer-->

  <!--start cart-->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart">
    <div class="offcanvas-header border-bottom h-70">
      <h5 class="mb-0" id="offcanvasRightLabel">8 New Orders</h5>
      <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="offcanvas">
        <i class="material-icons-outlined">close</i>
      </a>
    </div>
    <div class="offcanvas-body p-0">
      <div class="order-list">
        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/01.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">White Men Shoes</h5>
            <p class="mb-0 order-price">$289</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/02.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Red Airpods</h5>
            <p class="mb-0 order-price">$149</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/03.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Men Polo Tshirt</h5>
            <p class="mb-0 order-price">$139</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/04.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Blue Jeans Casual</h5>
            <p class="mb-0 order-price">$485</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/05.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Fancy Shirts</h5>
            <p class="mb-0 order-price">$758</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/06.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Home Sofa Set </h5>
            <p class="mb-0 order-price">$546</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/07.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Black iPhone</h5>
            <p class="mb-0 order-price">$1049</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>

        <div class="order-item d-flex align-items-center gap-3 p-3 border-bottom">
          <div class="order-img">
            <img src="assets/images/orders/08.png" class="img-fluid rounded-3" width="75" alt="">
          </div>
          <div class="order-info flex-grow-1">
            <h5 class="mb-1 order-title">Goldan Watch</h5>
            <p class="mb-0 order-price">$689</p>
          </div>
          <div class="d-flex">
            <a class="order-delete"><span class="material-icons-outlined">delete</span></a>
            <a class="order-delete"><span class="material-icons-outlined">visibility</span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="offcanvas-footer h-70 p-3 border-top">
      <div class="d-grid">
        <button type="button" class="btn btn-grd btn-grd-primary" data-bs-dismiss="offcanvas">View
          Products</button>
      </div>
    </div>
  </div>
  <!--end cart-->

  <!--bootstrap js-->
  <script src="{{theme('assets/js/bootstrap.bundle.min.js')}}"></script>

  <!--plugins-->
  <script src="{{theme('assets/js/jquery.min.js')}}"></script>
  <!--plugins-->
  <script src="{{theme('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{theme('assets/plugins/metismenu/metisMenu.min.js')}}"></script>
  <script src="{{theme('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
  <script src="{{theme('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{theme('assets/plugins/peity/jquery.peity.min.js')}}"></script>
  <script src="{{theme('assets/js/jquery.min.js')}}"></script>
  <script src="{{theme('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{theme('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

  <script>
    $(".data-attributes span").peity("donut");
  </script>
  <script>
    $(function () {
    $('[data-bs-toggle="tooltip"]').tooltip();
      })
  </script>
  <script src="{{theme('assets/js/dashboard2.js')}}"></script>
  <script src="{{theme('assets/js/main.js')}}"></script>
  <script>
    function deleteMember(id) {
      if (confirm('Are you sure you want to delete this member?')) {
        document.getElementById('delete-form-' + id).submit();
      }
    }
  </script>
  @stack('scripts')
</body>

</html>
