<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Import Data</title>
</head>
<body>

  <form action="{{ route('customers.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <legend>Upload File</legend>
    <input type="file" name="file" id="file"><br>
    <button type="submit">Upload</button><br>
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
</body>
</html>