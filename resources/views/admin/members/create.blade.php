@extends('layouts.master')
@section('currentPage')
Add Member
@endsection
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="mb-4">
          <h5 class="mb-3">Discord Username <span class="text-danger">*</span></h5>
          <input type="text" class="form-control" placeholder="Discord Username">
        </div>
        <div class="mb-4">
          <h5 class="mb-3">Whatsapp Number <span class="text-danger">*</span></h5>
          <input type="tel" class="form-control" placeholder="Whatsapp Number">
        </div>
        <div class="mb-4">
          <h5 class="mb-3">Email Address</h5>
          <input type="email" class="form-control" placeholder="Email Address">
        </div>
        <div class="mb-4">
          <h5 class="mb-3">Subscription Plan <span class="text-danger">*</span></h5>
          <select class="form-select">
            <option selected="selected">Monthly</option>
            <option value="1">6-Months</option>
            <option value="2">Yearly</option>
            <option value="3">Lifetime</option>
            <option value="3">Free</option>
          </select>
        </div>
        <div class="mb-4">
          <h5 class="mb-3">Remarks / Notes</h5>
          <textarea class="form-control" cols="4" rows="6" placeholder="write a Remark / Note here..."></textarea>
        </div>
        <div class="col-12">
          <div class="d-grid">
            <button type="button" class="btn btn-primary">Add Member</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection
