@foreach($product_detail as $key => $value)
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/css/product.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/css/sweetalert.css')}}">
	<title>{{ $value->product_name }}</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

		<div class="product">
			<div class="product-item">
				<div class="row">
  					<div class="col-8">
  						<div class="card-wrapper">
  							<div class="product-imgs">
  								<div class="img-display">
  									<div class="img-showcase">
  										<img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="shoe img">
  									</div>
  								</div>
  								{{-- <div class="img-select">
  									<div class="img-item">
  										<a href="#" data-id = "1">
  											<img src="{{ asset('resources/images/thuvien/1.jpg') }}" alt="shoe img">
  										</a>
  									</div>
  									<div class="img-item">
  										<a href="#" data-id = "2">
  											<img src="{{ asset('resources/images/thuvien/2.jpg') }}" alt="shoe img">
  										</a>
  									</div>
  									<div class="img-item">
  										<a href="#" data-id = "3">
  											<img src="{{ asset('resources/images/thuvien/3.jpg') }}" alt="shoe img">
  										</a>
  									</div>
  									<div class="img-item">
  										<a href="#" data-id = "4">
  											<img src="{{ asset('resources/images/thuvien/4.jpg') }}" alt="shoe img">
  										</a>
  									</div>
  									<div class="img-item">
  										<a href="#" data-id = "5">
  											<img src="{{ asset('resources/images/thuvien/5.jpg') }}" alt="shoe img">
  										</a>
  									</div>
  									<div class="img-item">
  										<a href="#" data-id = "6">
  											<img src="{{ asset('resources/images/thuvien/6.jpg') }}" alt="shoe img">
  										</a>
  									</div>
  								</div> --}}
  							</div>
  						</div>
  					</div>
  					<div class="col-3">
  						
  					<div class = "product-content">
			          <h2 class = "product-title">{{$value->product_name}}</h2>
			          <div class = "product-price">
			            <p class = "last-price">Giá: <span>{{number_format($value->product_price,0,',','.').' '.'VNĐ'}}</span></p>
			          </div>

			          <div class = "product-detail">
			            <h2 style="font-weight: bold">Mô tả sản phẩm: </h2>
			            <p style="font-size: 20px; font-weight: bold">{{ $value->product_desc }}</p>
			            {{-- <h3>Size</h3>
			            	<div class="size-selector">                               
       						 	<button class="size">38 VN</button>
        						<button class="size">39 VN</button>
        						<button class="size">40 VN</button>
        						<button class="size">41 VN</button>
        						<button class="size active">42 VN</button>
        						<button class="size">43 VN</button>
        						<button class="size">44 VN</button>
        						<button class="size">45 VN</button>
    						</div> --}}
			            
			          </div>

			        <form>
			        	@csrf
			        	<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
			        	<input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
			        	<input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
			        	<input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
			        	<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}" value="1">
			          <div class="purchase-info">
			            <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}">
			            <button type="button" class="btn add-to-cart" name="add-to-cart" data-id_product="{{ $value->product_id }}">            	
			              		Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i>    	        	
			            </button>

			          </div>
			      	</form>
			      	</div>
			        
  					</div>
  				
				</div>

			</div>
			
		</div>

@endforeach

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
                    <ul>
                        <li>Đồ án tốt nghiệp (Chủ đề: Xây dựng Website bán giày)</li>
                        <li>Khoa: CNTT</li>
                    </ul>
                    </div>

                </div>
            </div>
        </div>

		<div class="social">
			<span id="show-cart-quantity">
                <a href="{{ URL::to('/gio-hang') }}" class="notification"><i class="fas fa-shopping-cart"></i></a>
            </span>	
		</div>

<script src="{{ asset('resources/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('resources/js/product.js') }}"></script>
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