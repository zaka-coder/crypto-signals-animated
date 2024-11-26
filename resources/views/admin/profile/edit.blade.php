@extends('layouts.master')
@section('currentPage')
Edit Profile
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        @if(session('success'))
        <div class="text-success mb-4">
          {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('profile.update') }}" method="post" autocomplete="off">
          @csrf
          @method('put')

          <h4 class="my-3">Edit Profile</h4>
          <div class="mb-4">
            <h5 class="mb-3">Name <span class="text-danger">*</span></h5>
            <input type="text" class="form-control" placeholder="" name="name"
              value="{{ old('name', auth()->user()->name) }}">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-4">
            <h5 class="mb-3">Email <span class="text-danger">*</span></h5>
            <input type="email" class="form-control" placeholder="" name="email"
              value="{{ old('email', auth()->user()->email) }}">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="col-12">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
          </div>

        </form>

        <hr class="py-4">

        <form action="{{ route('password.update') }}" method="post" autocomplete="off">
          @csrf
          @method('put')
          <h4 class="my-3">Change Password</h4>

          <div class="mb-4">
            <h5 class="mb-3">New Password <span class="text-danger">*</span></h5>
            <input type="password" id="password" class="form-control" placeholder="" name="password" autocomplete="off">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-4">
            <h5 class="mb-3">Confirm New Password <span class="text-danger">*</span></h5>
            <input type="password" id="password_confirmation" class="form-control" value="" name="password_confirmation"
              autocomplete="off">
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-4">
            <h5 class="mb-3">Current Password <span class="text-danger">*</span></h5>
            <input type="password" id="old_password" class="form-control" placeholder="" name="old_password"
              autocomplete="off">
            @error('old_password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="col-12">
            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Change Password</button>
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

</script>
@endpush