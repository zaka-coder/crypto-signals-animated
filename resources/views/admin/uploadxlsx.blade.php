@extends('layouts.master')
@section('currentPage')
Bulk Upload
@endsection
@section('content')
<div class="min-vh-100 py-5">
  <form action="{{ route('customers.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <legend>Upload File</legend>
    <input type="file" name="file" id="file" class="form-control"><br>
    <button type="submit" class="btn btn-primary d-block w-100">Upload</button><br>
    @error('file')
    <p>{{ $message }}</p>
    @enderror

    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif

    @if(session('error'))
    <p>{{ session('error') }}</p>
    @endif
  </form>
</div>
@endsection