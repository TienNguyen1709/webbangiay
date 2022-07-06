@extends('admin.admin_layout')
@section('admin_content')
<header>
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Tìm Kiếm">
            </div>
            
</header>
<main>
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="activity-card">
                <h3>Liệt kê mã giảm giá</h3>
          
            <div class="table-responsive">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-danger">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                        <tr>
                            <th>Tên mã giảm giá</th>
                            <th>Mã giảm giá</th>
                            {{-- <th>Số lượng giảm giá</th> --}}
                            <th>Điều kiện giảm giá</th>
                            <th>Số giảm</th>
                        </tr>
                    </thead>
                <tbody>
                @foreach($coupon as $key => $cou)
                <tr>
                    <td>{{ $cou->coupon_name }}</td>
                    <td>{{ $cou->coupon_code }}</td>
                    {{-- <td>{{ $cou->coupon_time }}</td> --}}
                    <td>
                        <span class="text-ellipsis">
                        <?php
                            if($cou->coupon_condition==1){
                        ?>
                            Giảm {{ $cou->coupon_number }}%
                        <?php
                            }else{
                        ?>
                            Giảm {{ $cou->coupon_number }}K
                        <?php
                            }
                        ?>
                        </span>
                    </td>
                    <td>
                        <a a onclick="return confirm('Bạn có chắc là muốn xóa ko?')" href="{{ URL::to('/delete-coupon/'.$cou->coupon_id) }}" ui-toggle-class="">
                        <i class="ti-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
</main>
@endsection