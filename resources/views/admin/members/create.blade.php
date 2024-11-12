@extends('layouts.master')
@section('currentPage')
  Add Member
@endsection
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <form action="{{ route('customers.store') }}" method="post">
            @csrf
            <div class="mb-4">
              <h5 class="mb-3">Name <span class="text-danger">*</span></h5>
              <input type="text" class="form-control" placeholder="Member Name" name="name">
              @error('name')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <h5 class="mb-3">Discord Username <span class="text-danger">*</span></h5>
              <input type="text" class="form-control" placeholder="Discord Username" name="discord_username">
              @error('discord_username')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <h5 class="mb-3">Whatsapp Number <span class="text-danger">*</span></h5>
              <input type="tel" class="form-control" placeholder="Whatsapp Number" name="whatsapp">
              @error('whatsapp')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <h5 class="mb-3">Email Address</h5>
              <input type="email" class="form-control" placeholder="Email Address" name="email">
              @error('email')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <h5 class="mb-3">Subscription Plan <span class="text-danger">*</span></h5>
              <select class="form-select" name="category_id">
                <option value="">Select...</option>
                @foreach ($categories as $key => $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category_id')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <h5 class="mb-3">Start Date <span class="text-danger">*</span></h5>
              <input type="date" class="form-control" name="starts_at">
              @error('starts_at')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="mb-4">
              <h5 class="mb-3">Remarks / Notes</h5>
              <textarea class="form-control" name="remarks" cols="4" rows="6" placeholder="Write a Remark / Note here..."></textarea>
            </div>
            <div class="col-12">
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Add Member</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
@endsection
