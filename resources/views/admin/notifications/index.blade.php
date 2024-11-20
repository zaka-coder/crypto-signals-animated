@extends('layouts.master')
@section('currentPage')
  Notifications
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="notificationsTable" class="table table-striped table-bordered"
          style="border-collapse: collapse!important;border-left: 1px solid #80808059;">
          <thead>
            <tr>
              <th class="align-middle text-center">Sr .No</th>
              <th class="align-middle text-center">Discord Username</th>
              <th class="align-middle text-center">Description</th>
              <th class="align-middle text-center">Status</th>
              <th class="align-middle text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notifications as $key => $notification)
              <tr>
                <td data-cell="Sr.No" class="align-middle " style="text-align: start">{{ ++$key }}</td>
                <td data-cell="Member Name" class="align-middle " style="text-align: start">
                  {{ $notification->customer->discord_username ?? '' }}</td>
                <td data-cell="Discord Username" class="align-middle " style="text-align: start">
                  {{ $notification->description ?? '' }}</td>
                <td data-cell="Status" class="align-middle " style="text-align: start">
                  {{ $notification->is_read ? 'Already Read' : 'New' }}</td>

                  <!-- Actions -->
                <td data-cell="Actions" class="align-middle " style="text-align: start">
                  <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                      data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('customers.show', $notification->customer_id) }}"><i
                            class="bi bi-person me-2"></i>Member Profile</a>
                      </li>
                      <li><a class="dropdown-item"
                          href="{{ formatPhoneNumberForWhatsApp($notification->customer->whatsapp) }}" target="_blank"><i
                            class="bi bi-whatsapp me-2"></i>WhatsApp</a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li>
                        <a class="dropdown-item text-danger" href="javascript:;"
                          onclick="deleteRecord({{ $notification->id }})"><i class="bi bi-trash-fill me-2"></i>Delete</a>

                        {{-- Delete Form --}}
                        <form id="delete-form-{{ $notification->id }}"
                          action="{{ route('notifications.destroy', $notification) }}" method="POST" class="d-none">
                          @csrf
                          @method('DELETE')
                        </form>
                      </li>
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
      var table = $('#notificationsTable').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel']
      });

      table.buttons().container()
        .appendTo('#notificationsTable_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush
