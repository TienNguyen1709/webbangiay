<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/history.css') }}">
    <title>Quản lý đơn hàng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
                            <th>Tên người đặt</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Ghi chú</th>
                            <th>Hình thức thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                
                        <tr>
                            <td>{{ $shipping->shipping_name }}</td>
                            <td>{{ $shipping->shipping_address }}</td>
                            <td>{{ $shipping->shipping_phone }}</td>
                            <td>{{ $shipping->shipping_email }}</td>
                            <td>{{ $shipping->shipping_notes }}</td>
                            <td>@if($shipping->shipping_method==0)
                                Thanh toán khi nhận hàng
                                @else
                                Chuyển khoản
                                @endif
                            </td>
                        </tr>
                
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    <br><br>

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
                            <th>Tên sản phẩm</th>
                            <th>Số lượng kho còn</th>
                            <th>Mã giảm giá</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                        $total = 0;
                    @endphp
                @foreach($order_details as $key => $details)
                @php
                    $i++;
                    $subtotal = $details->product_price*$details->product_sales_quantity;
                    $total+=$subtotal;
                @endphp
                <tr>
                    <td>{{ $details->product_name }}</td>
                    <td>{{ $details->product->product_quantity }}</td>
                    <td>@if($details->product_coupon!='Ko')
                            {{ $details->product_coupon }}
                        @else
                            Không có mã giảm giá
                        @endif
                    </td>
                    <td>
                        <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} {{$order_status==3 ? 'disabled' : ''}} class="order_qty_{{ $details->product_id }}" value="{{ $details->product_sales_quantity }}" name="product_sales_quantity">
                        <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{ $details->product_id }}" value="{{$details->product->product_quantity}}">
                        <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">
                        <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
                        
                    </td>
                    <td>{{ number_format($details->product_price,0,',','.') }}đ</td>
                    <td>{{ number_format($subtotal,0,',','.') }}đ</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="6">
                        @php
                            $total_coupon = 0;
                        @endphp
                        @if($coupon_condition==1)
                            @php
                            $total_after_coupon = ($total*$coupon_number)/100;
                            echo 'Tổng giảm:'.number_format($total_after_coupon,0,',','.').'</br>';
                            $total_coupon = $total - $total_after_coupon;
                            @endphp
                        @else
                            @php
                            echo 'Tổng giảm:'.number_format($coupon_number,0,',','.').'k'.'</br>';
                            $total_coupon = $total - $coupon_number;
                            @endphp
                        @endif
                        Thanh toán: {{ number_format($total_coupon,0,',','.') }}đ
                    </td>
                </tr>
                </tbody>    
                </table>
                {{-- Hủy đơn hàng --}}
                    @if($order_status!=2 && $order_status!=3)
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydon">Hủy đơn hàng</button>
                    @endif
                        <div id="huydon" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <form>
                                @csrf
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Lý do hủy đơn hàng</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <div class="modal-body">
                                        <p><textarea rows="5" class="lydohuydon" cols="61" required placeholder="Lý do hủy đơn hàng...(bắt buộc)" style="border: none; background-color: #f2f2f2"></textarea></p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                        <button type="button" id="{{ $details->order_code }}" onclick="Huydonhang(this.id)" class="btn btn-success">Gửi lý do hủy</button>
                                      </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                {{-- Kết thúc hủy đơn hàng --}}
            </div>
            </div>
        </div>
    </section>
</form>
    
   



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
        function Huydonhang(id){
            var order_code = id;
            var lydo = $('.lydohuydon').val();
          
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url:'{{url('/huy-don-hang')}}',
                method:"POST",

                data:{order_code:order_code, lydo:lydo, _token:_token},
                success:function(data){
                    alert('Hủy đơn hàng thành công');
                    window.location.href = "{{url('/history')}}";
                }

            }); 
        }
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