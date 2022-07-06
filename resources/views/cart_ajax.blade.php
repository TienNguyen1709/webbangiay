<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/css/cart.css') }}">
	<title>Giỏ hàng</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	

	<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="logo">
			<a href="{{URL::to('/trang-chu')}}">
            <img src="{{ asset('resources/images/newlogo.png') }}">
            </a>
			<div class="box">
				<form action="{{URL::to('/tim-kiem')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="keywords_submit" placeholder="Tìm Kiếm">
                    <input type="submit" name="search_items" value="Tìm Kiếm">
                </form>
			</div>
			<div class="login">
                <?php 
                    $id = Session::get('id');
                    if($id!=NULL){

                ?>
                <h3><a href="{{ URL::to('/dang-xuat') }}" class="dn">Đăng Xuất  </a></h3>   
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


		<section class="mt-5">
        <div class="container">
            <div class="cart">
            			<?php
                            $message = Session::get('message');
                            if($message){
                            echo '<span class="text-danger">'.$message.'</span>';
                            Session::put('message',null);
                        	}
                        ?>
            <div class="table-responsive">
            	<form action="{{url('/update-cart')}}" method="POST">
					@csrf
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-white" id="text-1">Sản phẩm</th>
                            <th class="text-white" id="text-2">Giá</th>
                            <th class="text-white" id="text-3">Số Lượng</th>
                            <th class="text-white" id="text-3">Thành tiền</th>
                            <th class="text-white" id="text-4">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@if(Session::get('cart')==true)
                    	@php
                        	$total = 0;
                        @endphp
                        @foreach(Session::get('cart') as $key => $cart)
                        	@php
                        		$subtotal = $cart['product_price']*$cart['product_qty'];
                        		$total+=$subtotal;
                        	@endphp
                        <tr>
                            <td>
                                <div class="main">
                                    <div class="d-flex">
                                         <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{ $cart['product_name'] }}">
                                    </div>
                                    <div class="des">
                                        <p>{{ $cart['product_name'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5>{{ number_format($cart['product_price'],0,',','.') }}đ</h5>
                            </td>
                            <td>
                               
								<input class="cart_quantity" type="number" name="cart_qty[{{$cart['session_id']}}]" min = "1" value="{{ $cart['product_qty'] }}" style="width: 90px">
                            </td>
                            <td>
                            	<h5 style="color: #e7ab3c">{{ number_format($subtotal,0,',','.') }}đ</h5>
                            </td>
                            	
                            <td>
                                <a href="{{ URL::to('/delete-cart/'.$cart['session_id']) }}"><i class="fas fa-trash-alt" style="font-size: 26px"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <div class="col-lg-5 offset-lg-5">
        <div class="checkout">
        	<td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="update" style="margin-bottom: 10px; margin-top: 10px; margin-right: 10px; width: 150px; border-radius: 0 0 0 0">
        	<a class="btn btn-default check_out" href="{{url('/del-all-product')}}" style="margin-left: -17px">Xóa tất cả giỏ hàng</a></td>
        	<td><span style="font-weight: bold; color:#e7ab3c; font-size: 22px">Tổng Tiền: {{ number_format($total,0,',','.') }}đ</span></td>

        </div>
    </div>
    
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    
</form>
	<div class="col-lg-4 offset-lg-4">
		<div class="checkout">        	
                <?php
                $id = Session::get('id');
                if($id!=NULL){ 
            	?>               
	            <a class="proceed-btn" href="{{URL::to('/checkout')}}">Thanh toán</a>
	            <?php
	            }else{
	            ?>              
	            <a class="proceed-btn" href="{{URL::to('/dang-nhap')}}">Thanh toán</a>
	            <?php 
	            }
	            ?>
        </div> 
    </div>
    @else 
		<tr>
			<td colspan="5"><center>
			@php 
			echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
			@endphp
			</center></td>
		</tr>
	@endif



    	{{-- <div style="margin-top: 200px">
		<div class="footer">
			<img src="{{ asset('resources/images/logo 2.png') }}">
		</div>
		<div class="footer1">
			<div class="header-footer">
				<div class="row">
					<div class="col-sm-2">
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
					</div>

					<div class="col">
					<ul>
						<li>CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ NGHỊ HƯNG</li>
						<li>Mã Số Thuế : 0302996517</li>
						<li><i class='fas fa-map-marker-alt' style='font-size:24px'></i>122 Ba Tháng Hai, Phường 12, Quận 10, Thành Phố Hồ Chí Minh.</li>
						<li><i class="fa fa-phone" style="font-size:24px"></i>1900 88 6876</li>
						<li><i class="fa fa-envelope" style="font-size:24px"></i>info@converse.com.vn</li>
						<li><i class='fas fa-globe' style='font-size:24px'></i>www.converse.com.vn</li>
					</ul>
					</div>

				</div>
			</div>
		</div>
	</div> --}}



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