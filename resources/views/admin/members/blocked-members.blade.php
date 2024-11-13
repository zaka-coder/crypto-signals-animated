@extends('layouts.master')
@section('currentPage')
  Blocked Members
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="blocked-members" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th class="align-middle text-center">Sr .No</th>
              <th class="align-middle text-center">Member Name</th>
              <th class="align-middle text-center">Discord Username</th>
              <th class="align-middle text-center">Whatsapp Number</th>
              <th class="align-middle text-center">Email Address</th>
              <th class="align-middle text-center">Subscription Plan</th>
              <th class="align-middle text-center">Charges</th>
              <th class="align-middle text-center">Joining Date</th>
              <th class="align-middle text-center">Remaining Days</th>
              <th class="align-middle text-center">Blocked On</th>
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
                <td class="align-middle text-center">{{ $member->price ?? '' }}</td>
                <td class="align-middle text-center">
                  {{ \Carbon\Carbon::parse($member->starts_at)->format('d/m/Y') ?? '' }}</td>
                <td class="align-middle text-center">
                  @if ($member->expires_at)
                    {{ max(0, (int) \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($member->expires_at))) }} days
                  @else
                    ''
                  @endif
                </td>
                <td class="align-middle text-center">
                  {{ \Carbon\Carbon::parse($member->blocked_at)->format('d/m/Y') ?? '' }}</td>
                <td class="align-middle text-center">{{ $member->remarks ?? '' }}</td>
                <td class="align-middle text-center">
                  <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                      data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('customers.show', $member) }}"><i class="bi bi-person me-2"></i>Profile</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-check2-circle me-2"></i>Unblock</a>
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
        </table>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      var table = $('#blocked-members').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
      });

      table.buttons().container()
        .appendTo('#blocked-members_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush
