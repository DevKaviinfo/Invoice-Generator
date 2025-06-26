@extends('layouts.app')

@section('content')
<style>
  .gradient-custom {
    background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));
  }
</style>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
            <p class="text-white-50 mb-5">Please enter your login and password!</p>

            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="email">Email</label>
                <input id="email" type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                  <span class="invalid-feedback d-block text-danger mt-1">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="password">Password</label>
                <input id="password" type="password"
                  class="form-control @error('password') is-invalid @enderror"
                  name="password" required>
                @error('password')
                  <span class="invalid-feedback d-block text-danger mt-1">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-check d-flex justify-content-start mb-4">
                <input class="form-check-input me-2" type="checkbox" name="remember" id="remember"
                  {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">Remember Me</label>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

              @if (Route::has('password.request'))
                <p class="mt-3">
                  <a class="text-white-50" href="{{ route('password.request') }}">Forgot password?</a>
                </p>
              @endif

              <div class="d-flex justify-content-center mt-4">
                <a href="#" class="text-white me-3"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

              <p class="mb-0 mt-4">Don't have an account?
                <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
