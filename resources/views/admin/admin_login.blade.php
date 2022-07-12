<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập Admin</title>
	<link rel="stylesheet" type="text/css" href="resources/views/admin/css/login.css">
</head>
<body>
	<div class="container">
    <div class="form-container">
      <div class="form-body">
        <div class="header">
          <h2>Đăng Nhập</h2>
          <?php
            $message = Session::get('message');
            if($message){
            echo $message;
            Session::put('message',null);
            }
          ?>
        </div>
        <form action="{{ URL::to('/admin-dashboard') }}" method="post">
          {{ csrf_field() }}
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="ggg" name="admin_email" placeholder="E-MAIL" required="">
          </div>
          <div class="input-group">
            <input type="password" class="ggg" name="admin_password" placeholder="PASSWORD" required="">
          </div>
          <div class="input-group right">
            <button>LOGIN</button>
          </div>
        </div>
      </form>
      </div>
      <div class="form-image">
        <div class="text">
          <h2>Chào Mừng Quản Lý</h2>
          <p>Chào mừng quản lý đã đến với trang web của chúng tôi !</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>