@php
$notifications = \App\Models\Notification::where('is_read', 0)->get();
@endphp

<!-- Notifications Modal -->
<div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow">
      <div class="modal-header border-bottom">
        <h5 class="modal-title" id="notificationsModalLabel">Alerts</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
          style="filter:invert(1)"></button>
      </div>
      <div class="modal-body p-0">
        <div class="notify-list">
          @foreach ($notifications as $notification)
          <div class="border-bottom  p-3">
            <a class="d-block text-decoration-none" href="{{ route('notifications.show', $notification->id) }}"
              style="white-space: normal">
              <h5 class="notify-title text-danger">{{ $notification->title ?? 'Notification' }}</h5>
              <p class="mb-0 notify-desc text-white">{{ $notification->description ?? '' }}</p>
              <div class="d-flex align-items-center justify-content-end">
                <p class="mb-0 notify-time text-white opacity-50">{{ $notification->created_at->diffForHumans() }}</p>
              </div>
            </a>
          </div>
          @endforeach

        </div>
      </div>
      <div class="modal-footer border-top">
        <div class="d-flex align-items-center justify-content-between w-100">
          <a href="{{ route('notifications.index') }}" class="text-white btn btn-secondary">See all
            Notifications</a>
          <button type="button" class="btn btn-secondary"
            onclick="document.getElementById('readAllForm').submit();">Mark
            all as read</button>
          <!-- Hidden Form -->
          <form id="readAllForm" action="{{ route('notifications.readAll') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!--start header-->
<header class="top-header ">
  <nav class="navbar navbar-expand align-items-center gap-4">
    <div class="btn-toggle">
      <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
    </div>
    <div class="search-bar flex-grow-1">
      <div class="position-relative">
        <div class="search-popup p-3">
          <div class="card rounded-4 overflow-hidden">
            <div class="card-header d-lg-none">
              <div class="position-relative">
                <input class="form-control rounded-5 px-5 mobile-search-control" type="text" placeholder="Search">
                <span
                  class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                <span
                  class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
              </div>
            </div>
            <div class="card-body search-content">
              <p class="search-title">Recent Searches</p>
              <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                <a href="javascript:;" class="kewords"><span>Angular Template</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Dashboard</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Admin Template</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Bootstrap 5 Admin</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Html eCommerce</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>Sass</span><i
                    class="material-icons-outlined fs-6">search</i></a>
                <a href="javascript:;" class="kewords"><span>laravel 9</span><i
                    class="material-icons-outlined fs-6">search</i></a>
              </div>
              <hr>
              <p class="search-title">Tutorials</p>
              <div class="search-list d-flex flex-column gap-2">
                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="list-icon">
                    <i class="material-icons-outlined fs-5">play_circle</i>
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title ">Wordpress Tutorials</h5>
                  </div>
                </div>
                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="list-icon">
                    <i class="material-icons-outlined fs-5">shopping_basket</i>
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title">eCommerce Website Tutorials</h5>
                  </div>
                </div>

                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="list-icon">
                    <i class="material-icons-outlined fs-5">laptop</i>
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title">Responsive Design</h5>
                  </div>
                </div>
              </div>

              <hr>
              <p class="search-title">Members</p>

              <div class="search-list d-flex flex-column gap-2">
                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="memmber-img">
                    <img src="assets/images/avatars/01.png" width="32" height="32" class="rounded-circle" alt="">
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title ">Andrew Stark</h5>
                  </div>
                </div>

                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="memmber-img">
                    <img src="assets/images/avatars/02.png" width="32" height="32" class="rounded-circle" alt="">
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title ">Snetro Jhonia</h5>
                  </div>
                </div>

                <div class="search-list-item d-flex align-items-center gap-3">
                  <div class="memmber-img">
                    <img src="assets/images/avatars/03.png" width="32" height="32" class="rounded-circle" alt="">
                  </div>
                  <div class="">
                    <h5 class="mb-0 search-list-title">Michle Clark</h5>
                  </div>
                </div>

              </div>
            </div>
            <div class="card-footer text-center bg-transparent">
              <a href="javascript:;" class="btn w-100">See All Search Results</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul class="navbar-nav gap-1 nav-right-links align-items-center">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-auto-close="outside"
          data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">apps</i></a>
        <div class="dropdown-menu dropdown-menu-end dropdown-apps shadow-lg p-3">
          <div class="border rounded-4 overflow-hidden">
            <div class="row row-cols-12 g-0 border-bottom">
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-name">
                    <a href="{{ route('customers.create') }}" class="text-white">
                      <p class="mb-0">Add a Member</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!--end row-->

            <div class="row row-cols-12 g-0 border-bottom">
              <div class="col border-end">
                <div class="app-wrapper d-flex flex-column gap-2 text-center">
                  <div class="app-name">
                    <a href="/expired-members" class="text-white">
                      <p class="mb-0">Expired Members</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>

      <li class="nav-item dropdown" id="notificationsDropdown">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-bs-auto-close="outside"
          data-bs-toggle="dropdown" href="javascript:;"><i class="material-icons-outlined">notifications</i>
          <span class="badge-notify">{{ $notifications->count() }}</span>
        </a>
        <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
          <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
            <h5 class="notiy-title mb-0">Alerts</h5>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons-outlined">
                  more_vert
                </span>
              </button>
              <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                <div><a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"
                    onclick="document.getElementById('readAllForm').submit();"><i
                      class="material-icons-outlined fs-6">done_all</i>Mark
                    all as read</a></div>
              </div>

              <!--read all form-->
              <form id="readAllForm" action="{{ route('notifications.readAll') }}" method="POST" class="d-none">
                @csrf
              </form>

            </div>
          </div>
          <div class="notify-list">
            @foreach ($notifications as $notification)
            <div>
              <a class="dropdown-item border-bottom py-2 position-relative"
                href="{{ route('notifications.show', $notification->id) }}" style="white-space: normal">
                <div class="d-flex align-items-center gap-3">
                  <div class="">
                    <h5 class="notify-title">{{ $notification->title ?? 'Notification' }}</h5>
                    <p class="mb-0 notify-desc">{{ $notification->description ?? '' }}</p>
                    <div class="d-flex align-items-center justify-content-end">
                      <p class="mb-0 notify-time">{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                  </div>
                </div>
              </a>
              @endforeach
              <div class="text-center mt-4">
                <a href="{{ route('notifications.index') }}" class="text-white btn btn-secondary">See all
                  Notifications</a>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
          <img src="{{ theme('assets/images/user.png') }}" class="rounded-circle p-1 border" width="45" height="45"
            alt="">
        </a>
        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
          <div class="gap-2 py-2">
            <div class="text-center">
              <img src="{{ theme('assets/images/user.png') }}" class="rounded-circle p-1 shadow mb-3" width="90"
                height="90" alt="">
              <h5 class="user-name mb-0 fw-bold">Hello,M.Haris</h5>
            </div>
          </div>
          <hr class="dropdown-divider">
          <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('profile.edit') }}"><i
              class="material-icons-outlined">edit</i>Edit Profile</a>
          <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="javascript:;"
            onclick="document.getElementById('logout-form').submit();"><i
              class="material-icons-outlined">power_settings_new</i>Logout</a>

          <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
            @csrf
          </form>
        </div>
      </li>
    </ul>

  </nav>
</header>
<!--end top header-->

@push('scripts')
<script>
  document.addEventListener("DOMContentLoaded", function() {
      const currentRoute = "{{ Route::currentRouteName() }}";
      const notificationCount = {{ $notifications->count() }};
      if (currentRoute === "dashboard" && notificationCount > 0) {
        showNotificationsModal();
      }
    });

    function showNotificationsModal() {
      const modal = new bootstrap.Modal(document.getElementById('notificationsModal'));
      modal.show();
    }
</script>
@endpush