@extends('admin.admin_layout')
@section('admin_content')
<header>
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Tìm Kiếm">
            </div>
</header>
        
        <main>                      
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Thêm mã giảm giá</h3>
                        <?php
                            $message = Session::get('message');
                            if($message){
                            echo '<span class="text-danger">'.$message.'</span>';
                            Session::put('message',null);
                            }
                        ?>
                        <form role="form" action="{{ URL::to('/insert-coupon-code') }}" method="post">
                            @csrf
                        <div class="form-group">
                            <label>Tên mã giảm giá*</label>
                            <input type="text" name="coupon_name" placeholder="Tên mã giảm giá" class="form-control" style="width: 700px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mã giảm giá*</label>
                            <input type="text" name="coupon_code" placeholder="Mã giảm giá" class="form-control" style="width: 700px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng mã*</label>
                            <input type="text" name="coupon_time" placeholder="Số lượng mã" class="form-control" style="width: 700px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tính năng*</label>
                        <select name="coupon_condition" class="form-control input-sm m-bot15">
                            <option value="0">----Chọn----</option>
                            <option value="1">Giảm theo %</option>
                            <option value="2">Giảm theo tiền</option>
                        </select>
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm*</label>
                            <input type="text" name="coupon_number" placeholder="Nhập số % hoặc tiền giảm" class="form-control" style="width: 700px">
                        </div>
                        <div class="input-group right">
                            <button name="add_coupon">Thêm mã</button>
                        </div>
                    </div>
                </div>
            </section>   
        </main>
@endsection