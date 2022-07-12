@extends('admin.admin_layout')
@section('admin_content')
<header>
            {{-- <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Tìm Kiếm">
            </div>
             --}}
            
            
</header>
<main>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="activity-card">
                <h3>Liệt kê đơn hàng</h3>
                <?php
                            $message = Session::get('message');
                            if($message){
                            echo '<span class="text-danger">'.$message.'</span>';
                            Session::put('message',null);
                            }
                        ?>
          
            <div class="table-responsive">

                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Thứ tự</th>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tình trạng đơn hàng</th>
                            <th>Lý do hủy đơn</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($order as $key => $ord)
                    @php
                        $i++;
                    @endphp
                <tr>
                    <td><i>{{ $i }}</i></td>
                    <td>{{ $ord->order_code }}</td>
                    <td>{{ $ord->created_at }}</td>
                    <td>@if($ord->order_status==1)
                        <div class="order-status">
                            Đang xử lý
                        </div>
                        @elseif($ord->order_status==2)
                        <div class="order-status-complete">
                            Đã xử lý
                        </div>
                        @else
                        <div class="order-status-fail">
                            Hủy đơn hàng
                        </div>
                        @endif
                    </td>
                    <td>
                        @if($ord->order_status==3)
                        {{ $ord->order_cancel }}
                        @endif
                    </td>
                    <td>
                        <a href="{{ URL::to('/view-order/'.$ord->order_code) }}" ui-toggle-class="">
                        Xem chi tiết
                        </a>
                        <a a onclick="return confirm('Bạn có chắc là muốn xóa ko?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" ui-toggle-class="">
                        Xóa đơn hàng
                        </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
      </table>
        {{-- <div class="pagination">
            <a href="#">&laquo;</a>
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div> --}}
      </div>
    </div>
  </div>
</div>
</main>
        
@endsection