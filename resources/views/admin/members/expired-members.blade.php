@extends('layouts.master')
@section('currentPage')
  Expired Members
@endsection
@section('content')
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table id="expired-members" class="table table-striped table-bordered"
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
              <th class="align-middle text-center">Expired on</th>
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
                <td data-cell="Sr.No" class="align-middle " style="text-align: center">{{ ++$key }}</td>
                <td data-cell="Member Name" class="align-middle " style="text-align: center">{{ $member->name ?? '' }}
                </td>
                <td data-cell="Discord Username" class="align-middle " style="text-align: center">
                  {{ $member->discord_username ?? '' }}</td>
                <td data-cell="Whatsapp No" class="align-middle " style="text-align: center">{{ $member->whatsapp ?? '' }}
                </td>
                <td class="align-middle " style="text-align: center">{{ $member->email ?? '' }}</td>
                <td data-cell="Subscription Plan" class="align-middle " style="text-align: center">
                  {{ $member->category->name ?? '' }}</td>
                <td data-cell="Charges" class="align-middle " style="text-align: center">{{ $member->price ?? '' }}</td>
                <td data-cell="Joining Date" class="align-middle " style="text-align: center">
                  {{ $member->starts_at ?? '' }}
                </td>
                <td data-cell="Expired On" class="align-middle " style="text-align: center">
                  {{ $member->expires_at ?? '' }}</td>
                <td data-cell="Remarks" data-cell="Remarks" class="align-middle " style="text-align: center">
                  {{ $member->remarks ?? '' }}</td>
                <td data-cell="Actions" class="align-middle " style="text-align: center">
                  <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                      data-bs-toggle="dropdown">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('customers.show', $member) }}"><i
                            class="bi bi-person me-2"></i>Profile</a>
                      </li>
                      @if ($member->whatsapp && $member->whatsapp != '')
                        <li><a class="dropdown-item" href="{{ formatPhoneNumberForWhatsApp($member->whatsapp) }}"
                            target="_blank"><i class="bi bi-whatsapp me-2"></i>WhatsApp</a>
                        </li>
                      @endif
                      <li><a class="dropdown-item" href="{{ route('customers.renewPlan', $member) }}"><i
                            class="bi bi-arrow-repeat me-2"></i>Renew
                          Plan</a>
                      </li>
                      <li><a class="dropdown-item" href="javascript:;" onclick="toggleBlockMember({{ $member->id }}, this)">
                          @if ($member->is_blocked)
                            <i class="bi bi-check2-circle me-2"></i>Unblock
                          @else
                            <i class="bi bi-ban me-2"></i>Block
                          @endif
                        </a>
                      </li>
                      <li class="dropdown-divider"></li>
                      <li>
                        <a class="dropdown-item text-danger" href="javascript:;"
                          onclick="deleteMember({{ $member->id }}, 'expired-members')"><i class="bi bi-trash-fill me-2"></i>Delete</a>
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
      var table = $('#expired-members').DataTable({
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
        .appendTo('#expired-members_wrapper .col-md-6:eq(0)');

      // Add the "Delete Selected" button next to the DataTable buttons
      $('<button id="delete-selected" class="btn btn-danger ms-3">Delete Selected Members</button>')
        .appendTo('#expired-members_wrapper .col-md-6:eq(0)');

    });

    // Delete selected members
    $(document).ready(function() {
      let table = $('#expired-members').DataTable();

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
                table.row($(`#expired-members tbody tr[data-id="${id}"]`)).remove();
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
{{-- @push('scripts')
  <script>
    $(document).ready(function() {
      var table = $('#expired-members').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel']
      });

      table.buttons().container()
        .appendTo('#expired-members_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush --}}
