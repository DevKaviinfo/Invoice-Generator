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

            <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
            <p class="text-white-50 mb-4">Create your account below</p>

            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="name">Name</label>
                <input id="name" type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                  <span class="invalid-feedback d-block text-danger mt-1">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="email">Email</label>
                <input id="email" type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  name="email" value="{{ old('email') }}" required>
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

              <div class="form-outline form-white mb-4 text-start">
                <label class="form-label" for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password"
                  class="form-control" name="password_confirmation" required>
              </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

              <p class="mt-4 mb-0">Already have an account?
                <a href="{{ route('login') }}" class="text-white-50 fw-bold">Login</a>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
