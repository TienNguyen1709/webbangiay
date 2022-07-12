<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/history.css') }}">
    <title>Quản lý đơn hàng</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-white" id="text-1">Thứ tự</th>
                            <th class="text-white" id="text-2">Mã đơn hàng</th>
                            <th class="text-white" id="text-3">Ngày tháng đặt hàng</th>
                            <th class="text-white" id="text-3">Tình trạng đơn hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                       @php 
                          $i = 0;
                          @endphp
                          @foreach($getorder as $key => $ord)
                            @php 
                            $i++;
                            @endphp
                          <tr>
                            <td><i>{{$i}}</i></td>
                            <td>{{ $ord->order_code }}</td>
                            <td>{{ $ord->created_at }}</td>
                            
                            <td>@if($ord->order_status==1)
                                    Đang xử lý
                                @elseif($ord->order_status==2)
                                    Đã xử lý - Đã giao hàng
                                @else
                                    Đơn hàng đã bị hủy
                                @endif
                            </td>
                           
                           
                            <td>
                                <a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                                Xem đơn hàng</a><br>
                                
                            </td>
                          </tr>
                          @endforeach 
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </section>
    
</form>
    
   




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
                    location.reload(); 
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