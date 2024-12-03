@extends('layouts.master')
@section('currentPage')
Bulk Upload
@endsection
@section('content')
<div class="min-vh-100 py-5">
  <form action="{{ route('customers.import') }}" method="post" enctype="multipart/form-data">
    @csrf

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif


    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    <legend>Upload File</legend>
    <input type="file" name="file" id="file" class="form-control"><br>
    <button type="submit" class="btn btn-primary d-block w-100">Upload</button><br>
    @error('file')
    <p>{{ $message }}</p>
    @enderror

  </form>
  <p><i class="bi bi-info-circle"></i> <a class="text-decoration-underline text-white"
      href="{{asset('assets/sample.xlsx')}}" download="sample.xlsx">Download
      Sample</a></p>
</div>
@endsection