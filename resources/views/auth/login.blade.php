@extends('layouts.app')

@section('content')
<div class="card p-5 shadow m-auto" style="width: fit-content;border-radius:12px!important">
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row mb-3">
      <div class="col-md-12 m-auto">
        <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
        <input id="email" type="email" class="form- py-2 @error('email') is-invalid @enderror" name="email"
          value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-12 m-auto">
        <label for="password" class=" col-form-label ">{{ __('Password') }}</label>
        <div class="position-relative">
          <input id="password" type="password" class="form-control py-2 @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">
          <span class="bg-transparent border-0 position-absolute top-50 translate-middle-y toggle-password bi bi-eye"
            style="right: 10px" toggle="#password">
          </span>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-md-12 m-auto d-flex align-items-center justify-content-between">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
            : '' }}>

          <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
          </label>
        </div>
        {{-- @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
        @endif --}}
      </div>
    </div>

    <div class="row mb-0">
      <div class="col-md-12 m-auto">
        <button type="submit" class="btn btn-dark  fs-2  rounded-pill">
          {{ __('Login') }}
        </button>


      </div>
    </div>
  </form>
</div>
@endsection
@push('scripts')
<script>
  function togglePasswordVisibility(toggleButtonSelector, inputSelector) {
      $(toggleButtonSelector).click(function() {
          $(this).toggleClass("bi-eye bi-eye-slash");
          var input = $(inputSelector);
          if (input.attr("type") == "password") {
              input.attr("type", "text");
          } else {
              input.attr("type", "password");
          }
      });
  }

  // Example usage
  togglePasswordVisibility(".toggle-password", "#password");
</script>
@endpush