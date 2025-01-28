<!--start sidebar-->
<aside class="sidebar-wrapper " data-simplebar="true">
  <div class="sidebar-header">
    <div class="logo-icon">
      <img src="{{ theme('assets/images/logo-icon.png') }}" class="logo-img" alt="">
    </div>
    <div class="logo-name flex-grow-1">
      <h5 class="mb-0">Abucartel</h5>
    </div>
    <div class="sidebar-close">
      <span class="material-icons-outlined">close</span>
    </div>
  </div>
  <div class="sidebar-nav">
    <!--navigation-->
    <ul class="metismenu" id="sidenav">
      <li>
        <a href="/dashboard">
          <div class="parent-icon"><i class="material-icons-outlined">home</i>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      <li class="menu-label">Actions</li>
      <li>
        <a type="button">
          <div class="parent-icon"><i class="material-icons-outlined">group</i>
          </div>
          <div class="menu-title">Member Controls</div>
        </a>
        <ul>
          <li><a href="{{ route('customers.create') }}"><i class="material-icons-outlined">arrow_right</i>Add Member</a>
          </li>
          <li><a href="{{ route('customers.index') }}"><i class="material-icons-outlined">arrow_right</i>All Members</a>
          </li>
          <li><a href="/active-members"><i class="material-icons-outlined">arrow_right</i>Active Members</a>
          </li>
          {{-- <li><a href="/upcoming-renewal"><i class="material-icons-outlined">arrow_right</i>Upcoming Renewals</a>
          </li> --}}
          <li><a href="/expired-members"><i class="material-icons-outlined">arrow_right</i>Expired Members</a>
          </li>
          <li><a href="/blocked-members"><i class="material-icons-outlined">arrow_right</i>Blocked Members</a>
          </li>
          <li><a href="/recyclebin"><i class="material-icons-outlined">arrow_right</i>Recycle Bin</a>
          </li>
          <li><a href="/uploadspreadsheet"><i class="material-icons-outlined">arrow_right</i>Bulk Upload</a>
          </li>
        </ul>
      </li>
      <li class="menu-label">General</li>
      <li>
          @php
            $allCategories = \App\Models\Category::with('subCategories')->get();

            // Group categories by their parent
            $groupedCategoriesByParent = $allCategories->whereNull('parent_id')->map(function ($category) {
                return [
                    'parent' => $category,
                    'subCategories' => $category->subCategories,
                ];
            });
          @endphp

          @foreach ($groupedCategoriesByParent as $groupCategory)
          <a href="javascript:;">
            <div class="parent-icon"><i class="material-icons-outlined">category</i>
            </div>
            <div class="menu-title">{{ $groupCategory['parent']->name }} Categories</div>
          </a>
          <ul>
            @foreach ($groupCategory['subCategories'] as $subCategory)
              <li><a href="{{ route('customers.index', ['category_id' => $subCategory->id]) }}"><i
                    class="material-icons-outlined">arrow_right</i>{{ $subCategory->name }}</a>
              </li>
            @endforeach
          </ul>
          @endforeach

        {{-- <a href="javascript:;">
          <div class="parent-icon"><i class="material-icons-outlined">category</i>
          </div>
          <div class="menu-title">Categories</div>
        </a>
        <ul>
          @foreach ($categories as $category)
            <li><a href="{{ route('customers.index', ['filter' => $category->name]) }}"><i
                  class="material-icons-outlined">arrow_right</i>{{ $category->name }}</a>
            </li>
          @endforeach
        </ul> --}}

      </li>

    </ul>
    <!--end navigation-->
  </div>
</aside>
<!--end sidebar-->
