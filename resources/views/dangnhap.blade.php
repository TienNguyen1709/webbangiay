<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('resources/css/login.css') }}">
  </head>
  <body>
    <div class="center">
      <h1>Đăng Nhập</h1>
      <?php
            $message = Session::get('message');
            if($message){
            echo $message;
            Session::put('message',null);
            }
          ?>
      <form action="{{ URL::to('/dang-nhap') }}" method="post">
        {{ csrf_field() }}
        <div class="txt_field">
          <input type="text" required name="email">
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" required name="password">
          <span></span>
          <label>Mật Khẩu</label>
        </div>
        <input type="submit" value="Đăng Nhập">
        <div class="signup_link">
         <a href="{{ URL::to('/dang-ky') }}">Đăng Ký</a><br>
         <a href="{{ URL::to('/trang-chu') }}">Về trang chủ</a><br>
{{--          <a href="{{ URL::to('/quen-mat-khau') }}">Quên mật khẩu</a> --}}
        </div>
      </form>
    </div>

  </body>
</html>