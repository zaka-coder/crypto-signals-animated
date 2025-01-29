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
              <th class="align-middle text-center" data-orderable="false">
                <input type="checkbox" id="select-all"> <label for="select-all">Select All</label>
              </th>
              <th class="align-middle text-center">Sr .No</th>
              <th class="align-middle text-center">Discord Username</th>
              <th class="align-middle text-center">Description</th>
              <th class="align-middle text-center">Status</th>
              <th class="align-middle text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($notifications as $key => $notification)
            @if($notification->customer)
            <tr data-id="{{ $notification->id }}">
              <td class="align-middle text-center">
                <input type="checkbox" class="notification-checkbox" value="{{ $notification->id }}">
              </td>
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
                        href="{{ formatPhoneNumberForWhatsApp($notification->customer->whatsapp ?? '') }}" target="_blank"><i
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
            @endif
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
        buttons: ['copy', 'excel'],
        columnDefs: [{
            orderable: false,
            targets: 0
          } // Disable ordering on the first column (checkbox)
        ],
        order: [],
      });

      table.buttons().container()
        .appendTo('#notificationsTable_wrapper .col-md-6:eq(0)');

      // Add the "Delete Selected" button next to the DataTable buttons
      $('<button id="delete-selected" class="btn btn-danger ms-3">Delete Selected Notifications</button>')
        .appendTo('#notificationsTable_wrapper .col-md-6:eq(0)');
    });

    // Delete selected notifications
    $(document).ready(function() {
      let table = $('#notificationsTable').DataTable();

      // Select/Unselect all checkboxes
      $('#select-all').on('change', function() {
        $('.notification-checkbox').prop('checked', this.checked);
      });

      // Delete selected notifications
      $('#delete-selected').on('click', function() {
        let selectedIds = [];
        $('.notification-checkbox:checked').each(function() {
          selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
          alert('No notifications selected.');
          return;
        }

        if (!confirm('Are you sure you want to delete the selected notifications?')) {
          return;
        }

        $.ajax({
          url: '/notifications/delete-multiple',
          type: 'POST',
          data: {
            _token: '{{ csrf_token() }}',
            ids: selectedIds
          },
          success: function(response) {
            if (response.success) {
              // uncheck the select-all checkbox
              $('#select-all').prop('checked', false);

              // Remove rows from DataTable
              for (let id of selectedIds) {
                table.row($(`#notificationsTable tbody tr[data-id="${id}"]`)).remove();
              }
              table.draw(); // Redraw table
            } else {
              alert('Error: Unable to delete notifications.');
            }
          },
          error: function() {
            alert('Error: Could not process request.');
          }
        });
      });
    });
  </script>
@endpush
