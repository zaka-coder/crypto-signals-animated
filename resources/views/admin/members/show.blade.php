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
          <div class="w-100 mb-5">
            <div class="btn-group w-100">
              <a href="/edit-member" class="btn btn-outline-success"><i class="bi bi-pencil"></i> Edit</a>
              <button type="button" class="btn btn-outline-danger"><i class="bi bi-ban"></i> Block</button>
              <button type="button" class="btn btn-outline-danger"><i class="bi bi-trash3"></i> Delete</button>
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
              <span class="text-capitalize">{{ $customer->status }}</span>
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
            <table id="specific-member" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="align-middle text-center">Sr .No</th>
                  <th class="align-middle text-center">Subscription Plan</th>
                  <th class="align-middle text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customer->subscriptionsHistory as $key => $subscription)
                  <tr>
                    <td class="align-middle text-center">{{ ++$key }}</td>
                    <td class="align-middle text-center">{{ $subscription->category->name }}</td>
                    <td class="align-middle text-center">
                      <div class="dropdown">
                        <button class="btn btn-sm dropdown-toggle dropdown-toggle-nocaret" type="button"
                          data-bs-toggle="dropdown">
                          <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-arrow-repeat me-2"></i>Renew
                              Plan</a></li>
                          <li><a class="dropdown-item" href="javascript:;"><i class="bi bi-ban me-2"></i>Block</a></li>
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
    </div>
  </div>
@endsection
@push('scripts')
  <script>
    $(document).ready(function() {
      var table = $('#specific-member').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print']
      });

      table.buttons().container()
        .appendTo('#specific-member_wrapper .col-md-6:eq(0)');
    });
  </script>
@endpush
