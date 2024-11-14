@extends('layouts.master')
@section('currentPage')
  Edit Member
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('customers.update', $customer) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
              <h5 class="mb-3">Name <span class="text-danger">*</span></h5>
              <input type="text" class="form-control" placeholder="Member Name" name="name" value="{{ old('name', $customer->name) }}">
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <h5 class="mb-3">Discord Username <span class="text-danger">*</span></h5>
              <input type="text" class="form-control" placeholder="Discord Username" name="discord_username" value="{{ old('discord_username', $customer->discord_username) }}">
              @error('discord_username')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <h5 class="mb-3">Whatsapp Number <span class="text-danger">*</span></h5>
              <input type="tel" class="form-control" placeholder="Whatsapp Number" name="whatsapp" value="{{ old('whatsapp', $customer->whatsapp) }}">
              @error('whatsapp')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <h5 class="mb-3">Email Address</h5>
              <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{ old('email', $customer->email) }}">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <h5 class="mb-3">Subscription Plan <span class="text-danger">*</span></h5>
              <select class="form-select" name="category_id" id="category">
                <option value="">Select...</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" data-price="{{ $category->price }}" {{ old('category_id', $customer->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
              @error('category_id')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <h5 class="mb-3">Charges <span class="text-danger">*</span></h5>
              <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ old('price', $customer->price) }}">
              @error('price')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <h5 class="mb-3">Start Date <span class="text-danger">*</span></h5>
              <input type="date" class="form-control" name="starts_at" value="{{ old('starts_at', $customer->starts_at ? $customer->starts_at->format('Y-m-d') : '') }}">
              @error('starts_at')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-4">
              <h5 class="mb-3">Remarks / Notes</h5>
              <textarea class="form-control" name="remarks" cols="4" rows="6" placeholder="Write a Remark / Note here...">{{ old('remarks', $customer->remarks) }}</textarea>
            </div>

            <div class="col-12">
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update Member</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      $('#category').on('change', function() {
        var price = $(this).find(':selected').data('price'); // Get the data-price attribute
        $('#price').val(price); // Set the value to the price input
      });
    })
  </script>
@endpush
