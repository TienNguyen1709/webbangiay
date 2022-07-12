<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('resources/css/login.css') }}">
  </head>
  <body>
    <div class="center">
      <h1>Đăng Ký</h1>
      <form action="{{ URL::to('/dang-ky') }}" method="post">
        {{ csrf_field() }}
        <div class="txt_field">
          <input type="text" required name="name">
          <span></span>
          <label>Họ và tên</label>
        </div>
        <div class="txt_field">
          <input type="text" required name="phone">
          <span></span>
          <label>Số điện thoại</label>
        </div>
        <div class="txt_field">
          <input type="email" required name="email">
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" required name="password">
          <span></span>
          <label>Mật Khẩu</label>
        </div>
        <input type="submit" value="Đăng Ký">
        <div class="signup_link">
        <a href="{{ URL::to('/dang-nhap') }}">Đăng Nhập</a>
        <a href="{{ URL::to('/trang-chu') }}">Về trang chủ</a>
        </div>
      </form>
    </div>

  </body>
</html>