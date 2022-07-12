<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/css/checkout.css') }}">
	<title>Thanh toán</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="logo">
			<a href="{{URL::to('/trang-chu')}}">
            <img src="{{ asset('resources/images/newlogo.png') }}">
            </a>
			<div class="box">
				<form action="{{URL::to('/tim-kiem')}}" method="POST">
          {{ csrf_field() }}
            <input type="text" name="keywords_submit" placeholder="Tìm Kiếm" style="width: 340px; height: 47px; border: none; outline: none; padding: 0 25px; border-radius: 25px 0 0 25px;">
            <input type="submit" name="search_items" value="Tìm Kiếm">
        </form>
			</div>
			<div class="login">
                <?php 
                    $id = Session::get('id');
                    if($id!=NULL){

                ?>
                <h3><a href="{{ URL::to('/dang-xuat') }}" class="dn">Đăng Xuất</a></h3>   
                <?php 
                }else{
                ?>
                <h3><a href="{{ URL::to('/dang-nhap') }}" class="dn">Đăng Nhập</a> | <a href="{{ URL::to('/dang-ky') }}" class="dk">Đăng Ký</a></h3>  
                <?php 
                }
                ?>
            </div>
            <div class="login">
                <h3><a href="{{ URL::to('/history') }}">Quản lý đơn hàng</a></h3>
            </div>
		</div>

		

       

		<div class="menu">
            <ul>
                @foreach($category as $key => $cate)
                <li><a href="{{ URL::to('/danh-muc-san-pham/'.$cate->category_id) }}">{{ $cate->category_name }}</a></li>
                @endforeach
            </ul>
        </div>

<div class="row">
	<div class="col-lg-4 offset-lg-3">
        <div class="checkout">
            <h3 class="text-20">Vui lòng nhập thông tin đơn hàng </h3>
            <form method="POST">
            	@csrf
            		<p><input class="w3-input w3-light-grey shipping_email" name="shipping_email" type="text" placeholder="Email"></p>
  							<p><input class="w3-input w3-light-grey shipping_name" name="shipping_name" type="text" placeholder="Họ và tên"></p>
  							<p><input class="w3-input w3-light-grey shipping_address" name="shipping_address" type="text" placeholder="Địa chỉ"></p>
  							<p><input class="w3-input w3-light-grey shipping_phone" name="shipping_phone" type="text" placeholder="Số điện thoại"></p>
  							<p><input class="w3-input w3-light-grey shipping_notes" name="shipping_notes" type="text" placeholder="Ghi chú"></p>
  							@if(Session::get('coupon'))
									@foreach(Session::get('coupon') as $key => $cou)
										<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
									@endforeach
									@else 
									<input type="hidden" name="order_coupon" class="order_coupon" value="Ko">
								@endif
  							<h4>Phương thức thanh toán</h4>
  							<input class="w3-radio payment_option" type="radio" name="payment_option" value="0">
								<label>Thanh toán khi nhận hàng</label><br>
								<input class="w3-radio payment_option" type="radio" name="payment_option" value="1">
								<label>Chuyển khoản</label>
  			
  							<input type="button" value="Đặt hàng" name="send_order" class="proceed-btn send_order" style="border-radius: 0 0px 0px 0">
  					</form>

        </div>
    </div>
    
    <div class="col-lg-2" style="margin-left: 250px">
    	<div class="container">
      <h4>Đơn hàng
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
        </span>
      </h4>
      	@php
          $total = 0;
        @endphp
        @foreach(Session::get('cart') as $key => $cart)
        @php
          $subtotal = $cart['product_price']*$cart['product_qty'];
          $total+=$subtotal;
        @endphp
      <p><a href="#">{{ $cart['product_name'] }}</a> <span style="margin-left: 30px">x{{ $cart['product_qty'] }}</span> <span class="price">{{ number_format($cart['product_price'],0,',','.') }}đ</span></p>
      @endforeach
      <hr>
      <p>Tổng cộng: <span class="price" style="color:black"><b>{{ number_format($total,0,',','.') }}đ</b></span></p> 
      </div>
    </div>
</div>
		<div class="footer">
			<img src="{{ asset('resources/images/logo 2.png') }}">
		</div>
		<div class="footer1">
            <div class="header-footer">
                <div class="row">
                    {{-- <div class="col-sm-2">
                    <ul>
                        <h1>Women</h1>
                        <li>Sneakers</li>
                        <li>Apparel</li>
                        <li>Accessories</li>
                        <li>New</li>
                        <li>Sale</li>
                        <li>Collection</li>
                    </ul>
                    </div>

                    <div class="col-sm-2">
                    <ul>
                        <h1>Men</h1>
                        <li>Sneakers</li>
                        <li>Apparel</li>
                        <li>Accessories</li>
                        <li>New</li>
                        <li>Sale</li>
                        <li>Collection</li>
                    </ul>
                    </div>

                    <div class="col-sm-2">
                    <ul>
                        <h1>Kids</h1>
                        <li>Sneakers</li>
                        <li>Apparel</li>
                        <li>Accessories</li>
                        <li>New</li>
                        <li>Sale</li>
                    </ul>
                    </div> --}}
                    <div class="col">
                    <ul>
                        <li>TRƯỜNG CAO ĐẲNG NGHỀ BÁCH KHOA HÀ NỘI</li>
                        <li><i class='fas fa-map-marker-alt' style='font-size:24px'></i>92A - Lê Thanh Nghị – Hai Bà Trưng – Hà Nội</li>
                        <li><i class="fa fa-phone" style="font-size:24px"></i>024.36230209 (Tổng đài) - 039.3006008 (Hotline)</li>
                        <li><i class="fa fa-envelope" style="font-size:24px"></i>contact@hactech.edu.vn</li>
                        <li><i class='fas fa-globe' style='font-size:24px'></i>www.converse.com.vn</li>
                    </ul>
                    </div>
                    <div class="col">
                    
                    </div>

                </div>
            </div>
        </div>





		<div class="social">
            <span id="show-cart-quantity">
                <a href="{{ URL::to('/gio-hang') }}" class="notification"><i class="fas fa-shopping-cart"></i></a>
            </span>  
        </div>

		<script type="text/javascript">
		$(document).on('click','.dn,.already-account',function(){
        $('.form').addClass('login-active').removeClass('sign-up-active')
    	});
 
    	$(document).on('click','.sign-up-btn',function(){
        $('.form').addClass('sign-up-active').removeClass('login-active')
    	});
 
    	$(document).on('click','.dk',function(){
        $('.form').addClass('sign-up-active').removeClass('login-active')
    	});

   	 	$(document).on('click','.form-cancel',function(){
        $('.form').removeClass('login-active').removeClass('sign-up-active')
    	});
		</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
          $(document).ready(function(){
            $('.send_order').click(function(){
            	           swal({
							  title: "Xác nhận đơn hàng",
							  text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
							  icon: "warning",
							  buttons: ["Hủy", "Xác nhận"],
							  dangerMode: true,
							})
							.then((isConfirm) => {
							  if (isConfirm) {
							  				var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val(); 
                        var shipping_method = $('.payment_option').val(); 
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();
                        
                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,shipping_method:shipping_method,order_coupon:order_coupon,_token:_token},
                            success:function(){
                            	swal("Đơn hàng đã được gửi! Chúng tôi sẽ liên hệ với bạn sớm nhất.", {
									icon: "success",
								});
                            }
                        });  
                        window.setTimeout(function(){ 
                            window.location.href = "{{url('/history')}}";
                        } ,3000);
							  } else {
							    swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
							  }
							});
                        
                });   
            });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        show_cart_quantity();
        function show_cart_quantity(){
                  $.ajax({
                    url:'{{url('/show-cart-quantity')}}',
                    method:"GET",
                    success:function(data){
                        $('#show-cart-quantity').html(data);
                       
                    }

                }); 
            }
        $('.add-to-cart').click(function(){
            var id= $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/add-cart-ajax')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                success:function(){
                    swal({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    },
                    function() {
                        window.location.href = "{{url('/gio-hang')}}";
                    });
                    show_cart_quantity();
                }
            });
        });
    });
</script>
</body>
</html>
