<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- CSS riêng -->
  <link rel="stylesheet" href="{{ asset('css/login/login.css') }}">
</head>
<body>

<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Ustora</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <!-- ✅ Form login -->
          <form id="loginForm" style="width: 23rem;">
            @csrf

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            <div class="form-outline mb-4">
              <input type="email" name="email" id="email" class="form-control form-control-lg" required />
              <label class="form-label" for="email">Email address</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="password" class="form-control form-control-lg" required />
              <label class="form-label" for="password">Password</label>
            </div>

            <div class="pt-1 mb-4">
              <button id="loginBtn" class="btn btn-info btn-lg btn-block" type="submit">Login</button>
            </div>

            <div id="loginMessage" class="mt-3"></div>

            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#">Forgot password?</a></p>
            <p>Don't have an account? <a href="#" class="link-info">Register here</a></p>
          </form>

        </div>

      </div>

      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- ✅ AJAX xử lý login -->
<script>
$(document).ready(function() {
  $('#loginForm').on('submit', function(e) {
    e.preventDefault(); // Ngăn reload trang

    // Lấy dữ liệu form
    let formData = $(this).serialize();

    // Xóa thông báo cũ
    $('#loginMessage').html('');

    // Hiển thị loading
    $('#loginBtn').prop('disabled', true).text('Loading...');

    $.ajax({
      url: "{{ route('ajax.login') }}", // Route xử lý AJAX
      method: "POST",
      data: formData,
      success: function(response) {
        if (response.status === 'success') {
          $('#loginMessage').html('<div class="text-success">' + response.message + '</div>');
          setTimeout(() => {
            window.location.href = response.redirect;
          }, 1000);
        } else {
          $('#loginMessage').html('<div class="text-danger">' + response.message + '</div>');
        }
      },
      error: function(xhr) {
        if (xhr.status === 422) {
          // Lỗi validate
          let errors = xhr.responseJSON.errors;
          let errorMsg = '';
          for (let field in errors) {
            errorMsg += errors[field][0] + '<br>';
          }
          $('#loginMessage').html('<div class="text-danger">' + errorMsg + '</div>');
        } else {
          $('#loginMessage').html('<div class="text-danger">Lỗi hệ thống, vui lòng thử lại!</div>');
        }
      },
      complete: function() {
        // Mở lại nút login
        $('#loginBtn').prop('disabled', false).text('Login');
      }
    });
  });
});
</script>

</body>
</html>
