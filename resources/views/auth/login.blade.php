@extends('layouts.login_layout')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="/"><b>Tennis</b>Tour</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Вход</p>
  
        <form action="{{ route('login') }}" method="post">
        @csrf
          <div class="input-group mb-3">
            <input placeholder="Электронная почта" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input placeholder="Пароль" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                  Запомнить
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Вход</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        @if (Route::has('password.request'))
        <p class="mb-1">
            <a href="{{ route('password.request') }}">
                Забыли пароль?
            </a>
        </p>
        @endif
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
