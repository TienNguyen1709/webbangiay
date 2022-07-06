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
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Sửa sản phẩm</h3>
                        <?php
                            $message = Session::get('message');
                            if($message){
                            echo '<span class="text-danger">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        @foreach($edit_product as $key => $pro)
                        <form role="form" action="{{ URL::to('/update-product/'.$pro->product_id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên sản phẩm*</label>
                            <input type="text" name="product_name" placeholder="Tên sản phẩm" class="form-control" style="width: 700px" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label>Số lượng sản phẩm*</label>
                            <input type="text" name="product_quantity" placeholder="Số lượng sản phẩm" class="form-control" style="width: 700px" value="{{$pro->product_quantity}}">
                        </div>
                        <div class="form-group">
                            <label>Giá bán sản phẩm*</label>
                            <input type="text" name="product_price" placeholder="Giá sản phẩm" class="form-control" style="width: 700px" value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label>Giá gốc sản phẩm*</label>
                            <input type="text" name="price_cost" placeholder="Giá sản phẩm" class="form-control" style="width: 700px" value="{{$pro->price_cost}}">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh sản phẩm*</label>
                            <input type="file" name="product_image" placeholder="Hình ảnh sản phẩm" class="form-control"><br>
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm*</label>
                        <select name="product_cate" class="form-control input-sm m-bot15">
                            @foreach($cate_product as $key => $cate)
                                @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                        <input type="text" name="product_content" placeholder="Nội dung sản phẩm" class="form-control" value="{{$pro->product_content}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm*</label>
                            <textarea class="form-control" name="product_desc" placeholder="Mô tả" style="resize: none; width: 700px" rows="5">{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị*</label>
                        <select name="product_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                        </div>
                        <div class="input-group right">
                            <button>Cập nhật sản phẩm</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>   
        </main>
@endsection