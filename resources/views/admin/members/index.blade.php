@extends('layouts.master')
@section('currentPage')
  All Members
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="all-members" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="align-middle text-center">Sr .No</th>
              <th class="align-middle text-center">Member Name</th>
              <th class="align-middle text-center">Discord Username</th>
              <th class="align-middle text-center">Whatsapp Number</th>
              <th class="align-middle text-center">Email Address</th>
              <th class="align-middle text-center">Subscription Plan</th>
              <th class="align-middle text-center">Joining Date</th>
              <th class="align-middle text-center">Remaining Days</th>
              <th class="align-middle text-center">Remarks</th>
              <th class="align-middle text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($customers as $key => $member)
              <tr>
                <td class="align-middle text-center">{{ ++$key }}</td>
                <td class="align-middle text-center">{{ $member->name ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->discord_username ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->whatsapp ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->email ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->category->name ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->starts_at ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->expires_at ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->remarks ?? '' }}</td>
                <td class="align-middle text-center">
                  <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                      data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/profile"><i class="bi bi-person me-2"></i>Profile</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-arrow-repeat me-2"></i>Renew
                          Plan</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-ban me-2"></i>Block</a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li><a class="dropdown-item text-danger" href="javascript:;"><i
                            class="bi bi-trash-fill me-2"></i>Delete</a></li>
                    </ul>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
          {{-- <tfoot>
            <tr>
              <th class="align-middle text-center">Sr .No</th>
              <th class="align-middle text-center">Member Name</th>
              <th class="align-middle text-center">Discord Username</th>
              <th class="align-middle text-center">Whatsapp Number</th>
              <th class="align-middle text-center">Email Address</th>
              <th class="align-middle text-center">Subscription Plan</th>
              <th class="align-middle text-center">Joining Date</th>
              <th class="align-middle text-center">Remaining Days</th>
              <th class="align-middle text-center">Remarks</th>
              <th class="align-middle text-center">Actions</th>
            </tr>
          </tfoot> --}}
        </table>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      var table = $('#all-members').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
      });

      table.buttons().container()
        .appendTo('#all-members_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush
