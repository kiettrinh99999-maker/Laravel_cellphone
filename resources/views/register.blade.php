@extends('layouts.layout_auth')
@section('title')
Register
@endsection
@section('content')
<body>
    <div class="auth-page">
      <div class="auth-card">
        <h2>Create Account</h2>

        <form id="registerForm" method="post" action="#">
          <div class="form-group">
            <label for="fullname"><i class="fa fa-user"></i> Full Name</label>
            <input
              type="text"
              id="fullname"
              name="fullname"
              class="form-control"
              placeholder="Enter your full name"
              required
            />
          </div>

          <div class="form-group">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control"
              placeholder="Enter your email"
              required
            />
          </div>

          <div class="form-group">
            <label for="username"
              ><i class="fa fa-id-badge"></i> Username</label
            >
            <input
              type="text"
              id="username"
              name="username"
              class="form-control"
              placeholder="Choose a username"
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
              placeholder="Enter password"
              required
            />
          </div>

          <div class="form-group">
            <label for="confirm-password"
              ><i class="fa fa-lock"></i> Confirm Password</label
            >
            <input
              type="password"
              id="confirm-password"
              name="confirm-password"
              class="form-control"
              placeholder="Re-enter password"
              required
            />
          </div>

          <button type="submit" class="btn-auth">Register</button>

          <div class="bottom-text">
            Already have an account? <a href="login.html">Sign in here</a>
          </div>
        </form>
      </div>
    </div>
  </body>
  @endsection