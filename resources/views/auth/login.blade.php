@extends('layouts.landingTheme')

@section('content')
{{-- <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> --}}
<!-- Scripts style two -->
<!-- rts bread crumba rea start -->

<div class="rts-breadcrumb-area bg_image">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="baread-crumb-main-wrapper pt--100">
          <div class="inner">
            <span class="works">Get In Touch</span>
            <h1 class="title rts_hero__title">Contact Now</h1>
            <span class="bg-text">Contact Now</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- rts bread crumba rea end -->
<!-- Scripts style two End -->


<!-- appoinment area two start -->
<div class="appoinmnet-area-two rts-section-gap">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- appoinment area two start -->
        <div class="appoinment-area-two plr--120 plr_md--40 plr_sm--30">
          <div class="title-area-appoinment">
            <span class="pre">Appointment</span>
            <h2 class="title mb--0">
              Love to hear from you <br>
              <span>Get in touch!</span>
            </h2>
          </div>
          <form class="appoinment-h2 rts-slide-up-gsap" action="#">
            <div class="input-line">
              <div class="input-half">
                <label for="name">Your Name*</label>
                <input id="name" type="text" placeholder="Andrew Davis Kino...." required>
              </div>
              <div class="input-half">
                <label for="email">Your Email*</label>
                <input id="email" type="text" placeholder="info@mighty.net" required>
              </div>
            </div>
            <div class="input-line mt--40">
              <div class="input-half">
                <label for="name">What you are interested*</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Design & Branding</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="input-half">
                <label for="email">Project Budget*</label>
                <select class="form-select" aria-label="Default select example">
                  <option selected>Design & Branding</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
            </div>
            <div class="text-area mt--40">
              <label for="message">Message*</label>
              <textarea id="message" cols="30" rows="10" placeholder="Let tell us about your projects"></textarea>
            </div>
            <button class="submit-pd">Post Comment</button>
          </form>
        </div>
        <!-- appoinment area two end -->
      </div>
    </div>
  </div>
</div>
<!-- appoinment area two end -->
@endsection
