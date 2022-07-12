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
                        <h3>Cập nhật danh mục</h3>
                        <?php
                            $message = Session::get('message');
                            if($message){
                            echo '<span class="text-danger">'.$message.'</span>';
                            Session::put('message',null);
                            }
                        ?>
                        @foreach($edit_category_product as $key => $edit_value)
                        <form role="form" action="{{ URL::to('/update-category-product/'.$edit_value->category_id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên danh mục*</label>
                            <input type="text" name="category_name" placeholder="Tên danh mục" class="form-control" style="width: 700px" value="{{ $edit_value->category_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục*</label>
                            <textarea class="form-control" name="category_desc" placeholder="Mô tả danh mục" style="resize: none; width: 700px" rows="5">{{ $edit_value->category_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị*</label>
                        <select name="category_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                        </div>
                        <div class="input-group right">
                            <button>Cập nhật danh mục</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>   
        </main>
@endsection