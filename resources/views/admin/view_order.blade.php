@extends('admin.admin_layout')
@section('admin_content')
<header>
            {{-- <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Tìm Kiếm">
            </div>
             --}}

</header>
{{-- <main>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="activity-card">
                <h3>Thông tin tài khoản</h3>
          
            <div class="table-responsive">
                
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                <tbody>
               
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                </tr>
                
                </tbody>
      </table>
      
      </div>
    </div>
  </div>
</div>
</main>
<br> --}}
<main>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="activity-card">
                <h3>Thông tin người mua</h3>
          
            <div class="table-responsive">
                
                <table class="table table-striped b-t b-light">
                    <thead>
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
</div>
</main>
<br><br>

<main style="margin-bottom: 200px">
    <div class="table-agile-info" style="height:100px">
        <div class="panel panel-default">
            <div class="activity-card">
                <h3>Chi tiết đơn hàng</h3>
            <div class="table-responsive">
                <table class="table table-striped b-t b-light">    
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng kho còn</th>
                            <th>Mã giảm giá</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
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
                        @if($order_status!=2 && $order_status!=3)
                        <button class="btn btn-default update_quantity_order" data-product_id="{{$details->product_id}}" name="update_quantity_order">Cập nhật</button>
                        @endif
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
                <tr>
                    <td colspan="6">
                        @foreach($order as $key => $or)
                            @if($or->order_status==1)
                            <form>
                            @csrf
                            <select class="form-control order_details">
                                <option value="" disabled="disabled">---------Chọn hình thức đơn hàng---------</option>
                                <option id="{{ $or->order_id }}" selected value="1">Đang xử lý - Đang giao hàng</option>
                                <option id="{{ $or->order_id }}" value="2">Đã xử lý - Đã giao hàng</option>
                                <option id="{{ $or->order_id }}" value="3">Giao hàng không thành công - Hủy đơn hàng</option>
                            </select>
                            </form>
                            @elseif($or->order_status==2)
                            <form>
                            @csrf
                            <select class="form-control order_details" disabled="disabled">
                                <option value="" disabled="disabled">---------Chọn hình thức đơn hàng---------</option>
                                <option id="{{ $or->order_id }}" value="1">Đang xử lý - Đang giao hàng</option>
                                <option id="{{ $or->order_id }}" selected value="2">Đã xử lý - Đã giao hàng</option>
                                <option id="{{ $or->order_id }}" value="3">Giao hàng không thành công - Hủy đơn hàng</option>
                            </select>
                            </form>
                            @else
                            <form>
                            @csrf
                            <select class="form-control order_details" disabled="disabled">
                                <option value="" disabled="disabled">---------Chọn hình thức đơn hàng---------</option>
                                <option id="{{ $or->order_id }}" value="1">Đang xử lý - Đang giao hàng</option>
                                <option id="{{ $or->order_id }}" value="2">Đã xử lý - Đã giao hàng</option>
                                <option id="{{ $or->order_id }}" selected value="3">Giao hàng không thành công - Hủy đơn hàng</option>
                            </select>
                            </form>
                            @endif
                        @endforeach
                    </td>
                </tr>
                </tbody>
                
      </table>
      </div>

    </div>
    
  </div>

</div>
</main>
@endsection