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
            <th class="align-middle text-center">Discord Username</th>
            <th class="align-middle text-center">Whatsapp Number</th>
            <th class="align-middle text-center">Email Address</th>
            <th class="align-middle text-center">Subscription Plan</th>
            <th class="align-middle text-center">Joining Date</th>
            <th class="align-middle text-center">Remaining Days</th>
            <th class="align-middle text-center">Blocked on</th>
            <th class="align-middle text-center">Remarks</th>
            <th class="align-middle text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @for ($a = 0;$a<10;$a++) <tr>
            <td class="align-middle text-center">01</td>
            <td class="align-middle text-center">Tiger Nixon</td>
            <td class="align-middle text-center">0300000000</td>
            <td class="align-middle text-center">checking@gmail.com</td>
            <td class="align-middle text-center">Monthly</td>
            <td class="align-middle text-center">2011/04/25</td>
            <td class="align-middle text-center">2</td>
            <td class="align-middle text-center">2011/04/20</td>
            <td class="align-middle text-center">Remove from next month.</td>
            <td class="align-middle text-center">
              <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                  data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/profile"><i class="bi bi-person me-2"></i>Profile</a>
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
            @endfor
        </tbody>
        <tfoot>
          <tr>
            <th class="align-middle text-center">Sr .No</th>
            <th class="align-middle text-center">Discord Username</th>
            <th class="align-middle text-center">Whatsapp Number</th>
            <th class="align-middle text-center">Email Address</th>
            <th class="align-middle text-center">Subscription Plan</th>
            <th class="align-middle text-center">Joining Date</th>
            <th class="align-middle text-center">Remaining Days</th>
            <th class="align-middle text-center">Blocked on</th>
            <th class="align-middle text-center">Remarks</th>
            <th class="align-middle text-center">Actions</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
			var table = $('#blocked-members').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#blocked-members_wrapper .col-md-6:eq(0)' );
		} );
</script>
@endpush
