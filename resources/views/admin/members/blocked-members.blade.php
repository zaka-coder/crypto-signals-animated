@extends('layouts.master')
@section('currentPage')
Blocked Members
@endsection
@section('content')
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="blocked-members" class="table table-striped table-bordered"
        style="border-collapse: collapse!important;border-left: 1px solid #80808059;">
        <thead>
          <tr>
            <th class="align-middle text-center" data-orderable="false">
              <input type="checkbox" id="select-all"> <label for="select-all">Select All</label>
            </th>
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
          <tr data-id="{{ $member->id }}">
            <td class="align-middle text-center">
              <input type="checkbox" class="member-checkbox" value="{{ $member->id }}">
            </td>
            <td data-cell="Sr.No" class="align-middle " style="text-align: start">{{ ++$key }}</td>
            <td data-cell="Member Name" class="align-middle " style="text-align: start">{{ $member->name ?? '' }}</td>
            <td data-cell="Discord Username" class="align-middle " style="text-align: start">{{
              $member->discord_username ?? '' }}</td>
            <td data-cell="Whatsapp No" class="align-middle " style="text-align: start">{{ $member->whatsapp ?? '' }}
            </td>
            <td data-cell="Email Address" class="align-middle " style="text-align: start">{{ $member->email ?? '' }}
            </td>
            <td data-cell="Subscription Plan" class="align-middle " style="text-align: start">{{ $member->category->name
              ?? '' }}</td>
            <td data-cell=" Charges" class="align-middle " style="text-align: start">{{ $member->price ?? '' }}</td>
            <td data-cell="Joining Date" class="align-middle " style="text-align: start">
              {{ \Carbon\Carbon::parse($member->starts_at)->format('d/m/Y') ?? '' }}</td>
            <td data-cell="Remaining Days" class="align-middle " style="text-align: start">
              @if ($member->expires_at)
              {{ max(0, (int) \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($member->expires_at))) }} days
              @else
              ''
              @endif
            </td>
            <td data-cell="Blocked On" class="align-middle " style="text-align: start">
              {{ \Carbon\Carbon::parse($member->blocked_at)->format('d/m/Y') ?? '' }}</td>
            <td data-cell="Remarks" class="align-middle " style="text-align: start">{{ $member->remarks ?? '' }}</td>
            <td data-cell="Actions" class="align-middle " style="text-align: start">
              <div class="dropdown">
                <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                  data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots"></i>
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('customers.show', $member) }}"><i
                        class="bi bi-person me-2"></i>Profile</a>
                  </li>
                  <li><a class="dropdown-item" href="javascript:;" onclick="toggleBlockMember({{ $member->id }}, this, 'blocked-members')"><i
                        class="bi bi-check2-circle me-2"></i>Unblock</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item text-danger" href="javascript:;"
                      onclick="deleteMember({{ $member->id }}, 'blocked-members')"><i class="bi bi-trash-fill me-2"></i>Delete</a>
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
      var table = $('#blocked-members').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel'],
        // sort: false,
        columnDefs: [{
            orderable: false,
            targets: 0
          } // Disable ordering on the first column (checkbox)
        ],
        order: [],
      });

      table.buttons().container()
        .appendTo('#blocked-members_wrapper .col-md-6:eq(0)');

      // Add the "Delete Selected" button next to the DataTable buttons
      $('<button id="delete-selected" class="btn btn-danger ms-3">Delete Selected Members</button>')
        .appendTo('#blocked-members_wrapper .col-md-6:eq(0)');

    });

    // Delete selected members
    $(document).ready(function() {
      let table = $('#blocked-members').DataTable();

      // Select/Unselect all checkboxes
      $('#select-all').on('change', function() {
        $('.member-checkbox').prop('checked', this.checked);
      });

      // Delete selected members
      $('#delete-selected').on('click', function() {
        let selectedIds = [];
        $('.member-checkbox:checked').each(function() {
          selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
          alert('No members selected.');
          return;
        }

        if (!confirm('Are you sure you want to delete the selected members?')) {
          return;
        }

        $.ajax({
          url: '/customers/delete-multiple',
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
                table.row($(`#blocked-members tbody tr[data-id="${id}"]`)).remove();
              }
              table.draw(); // Redraw table
            } else {
              alert('Error: Unable to delete members.');
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
