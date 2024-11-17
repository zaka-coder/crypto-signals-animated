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
          <tr>
            <td data-cell="Sr.No" class="align-middle " style="text-align: center">{{ ++$key }}</td>
            <td data-cell="Member Name" class="align-middle " style="text-align: center">{{ $member->name ?? '' }}</td>
            <td data-cell="Discord Username" class="align-middle " style="text-align: center">{{
              $member->discord_username ??
              '' }}</td>
            <td data-cell="Whatsapp No" class="align-middle " style="text-align: center">{{ $member->whatsapp ?? '' }}
            </td>
            <td class="align-middle " style="text-align: center">{{ $member->email ?? '' }}</td>
            <td data-cell="Subscription Plan" class="align-middle " style="text-align: center">{{
              $member->category->name ?? '' }}</td>
            <td data-cell="Charges" class="align-middle " style="text-align: center">{{ $member->price ?? '' }}</td>
            <td data-cell="Joining Date" class="align-middle " style="text-align: center">{{ $member->starts_at ?? '' }}
            </td>
            <td data-cell="Expired On" class="align-middle " style="text-align: center">{{ $member->expires_at ?? ''
              }}</td>
            <td data-cell="Remarks" data-cell="Remarks" class="align-middle " style="text-align: center">{{
              $member->remarks ?? '' }}</td>
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
                  <li><a class="dropdown-item" href="{{ route('customers.renewPlan', $member) }}"><i
                        class="bi bi-arrow-repeat me-2"></i>Renew
                      Plan</a>
                  </li>
                  <li><a class="dropdown-item"
                      href="{{ route('customers.blockToggle', $member) }}">@if($member->is_blocked) <i
                        class="bi bi-check2-circle me-2"></i>Unblock @else <i class="bi bi-ban me-2"></i>Block
                      @endif</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li>
                    <a class="dropdown-item text-danger" href="javascript:;"
                      onclick="deleteMember({{ $member->id }})"><i class="bi bi-trash-fill me-2"></i>Delete</a>

                    {{-- Delete Form --}}
                    <form id="delete-form-{{ $member->id }}" action="{{ route('customers.destroy', $member) }}"
                      method="POST" class="d-none">
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
      var table = $('#expired-members').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
      });

      table.buttons().container()
        .appendTo('#expired-members_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush