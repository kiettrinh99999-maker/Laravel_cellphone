@extends('layouts.layout_auth')
@section('title')
Login
@endsection
@section('content')
<body>
  <div class="auth-page">
    <div class="auth-card">
      <h2>Sign In</h2>

      <form id="loginForm" method="post" action="#">
        <div class="form-group">
          <label for="username"><i class="fa fa-user"></i> Username</label>
          <input
            type="text"
            id="username"
            name="username"
            class="form-control"
            placeholder="Enter your username"
            required
          />
        </div>

        <div class="form-group">
          <label for="password"><i class="fa fa-lock"></i> Password</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            placeholder="Enter your password"
            required
          />
        </div>

        <div class="form-options">
          <div>
            <input type="checkbox" id="remember" />
            <label for="remember">Remember me</label>
          </div>
          <a href="#">Forgot Password?</a>
        </div>

        <button type="submit" class="btn-auth">Login</button>

        <div class="bottom-text">
          Don’t have an account?
          <a href="register.html">Create one</a>
        </div>
      </form>
    </div>
  </div>
</body>
@endsection