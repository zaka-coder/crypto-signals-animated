@extends('layouts.master')

@section('currentPage')
  Profile
@endsection

@section('content')
  <div class="row">
    <div class="col-12 col-lg-4 d-flex">
      <div class="card w-100">
        <div class="card-body">
          <div class="text-center pt-4 mb-3">
            <h4 class="mb-1">{{ $customer->name }}</h4>
            <p class="mb-0">{{ $customer->category->name }} Subscriber</p>
          </div>
          <div class="w-100 mb-3">
            <div class="btn-group w-100">
              <a href="{{ route('customers.edit', $customer) }}" class="btn btn-outline-success"><i
                  class="bi bi-pencil"></i> Edit</a>
              <a href="{{ route('customers.blockToggle', $customer) }}" class="btn btn-outline-warning">
                @if ($customer->is_blocked)
                  <i class="bi bi-check2-circle"></i> Unblock
                @else
                  <i class="bi bi-ban"></i>
                  Block
                @endif
              </a>
              <button type="button" class="btn btn-outline-danger" onclick="deleteMember({{ $customer->id }})"><i
                  class="bi bi-trash3"></i> Delete</button>
            </div>

            <!-- Delete Form -->
            <form id="delete-form-{{ $customer->id }}" action="{{ route('customers.destroy', $customer) }}" method="POST"
              class="d-none">
              @csrf
              @method('DELETE')
            </form>
          </div>

          <div class="w-100 mb-5">
            <div class="d-flex justify-content-center gap-3 w-100">
              <a href="{{ formatPhoneNumberForWhatsApp($customer->whatsapp) }}" target="_blank" class="btn btn-success"><i
                  class="bi bi-whatsapp"></i> Whatsapp</a>
              <a href="{{ route('customers.renewPlan', $customer) }}" class="btn btn-outline-primary"><i
                  class="bi bi-arrow-repeat"></i> Renew</a>
            </div>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item border-top">
              <b>Discord Username</b>
              <br>
              {{ $customer->discord_username }}
            </li>

            <li class="list-group-item border-top">
              <b>Whatsapp Number</b>
              <br>
              {{ $customer->whatsapp }}
            </li>

            <li class="list-group-item">
              <b>Email Address</b>
              <br>
              {{ $customer->email }}
            </li>

            <li class="list-group-item">
              <b>Subscription Plan</b>
              <br>
              {{ $customer->category->name }}
            </li>

            <li class="list-group-item">
              <b>Start Date</b>
              <br>
              {{ \Carbon\Carbon::parse($customer->starts_at)->format('d/m/Y') }}
            </li>

            <li class="list-group-item">
              <b>Remaining Days</b>
              <br>
              @if ($customer->expires_at)
                {{ max(0, (int) \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($customer->expires_at))) }} days
              @else
                ''
              @endif
            </li>

            <li class="list-group-item">
              <b>Remarks / Notes</b>
              <br>
              {{ $customer->remarks }}
            </li>

            <li class="list-group-item">
              <b>Status</b>
              <br>
              <span class="text-capitalize">{{ $customer->is_blocked ? 'Blocked' : $customer->status }}</span>
            </li>
          </ul>

        </div>
      </div>
    </div>

    <div class="col-12 col-lg-8 d-flex">
      <div class="card w-100">
        <div class="card-body">
          <h5 class="mb-3">Subscription History</h5>
          <div class="table-responsive">
            <table id="specific-member" class="table table-striped table-bordered"
              style="border-collapse: collapse!important;border-left: 1px solid #80808059;">
              <thead>
                <tr>
                  <th class="align-middle text-center">Sr .No</th>
                  <th class="align-middle text-center">Subscription Plan</th>
                  <th class="align-middle text-center">Charges</th>
                  <th class="align-middle text-center">Start Date</th>
                  <th class="align-middle text-center">End Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customer->subscriptionsHistory()->orderBy('id', 'desc')->get() as $key => $subscription)
                  <tr>
                    <td data-cell="Sr.No" class="align-middle " style="text-align: center">{{ ++$key }}</td>
                    <td data-cell="Subscription Plan" class="align-middle " style="text-align: center">
                      {{ $subscription->category->name }}
                    </td>
                    <td data-cell="Charges" class="align-middle " style="text-align: center">{{ $subscription->price }}
                    </td>
                    <td data-cell="Joining Date" class="align-middle " style="text-align: center">
                      {{ $subscription->starts_at->format('d/m/Y') }}
                    </td>
                    <td data-cell="End Date" class="align-middle " style="text-align: center">
                      {{ $subscription->expires_at->format('d/m/Y') }}
                    </td>
                  </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      var table = $('#specific-member').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel']
      });

      table.buttons().container()
        .appendTo('#specific-member_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush
