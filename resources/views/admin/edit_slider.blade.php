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
                        <h3>Sửa Slider</h3>
                        <?php
                            $message = Session::get('message');
                            if($message){
                            echo '<span class="text-danger">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        @foreach($edit_slider as $key => $sli)
                        <form role="form" action="{{ URL::to('/update-slider/'.$sli->slider_id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên slider*</label>
                            <input type="text" name="slider_name" placeholder="Tên slider" class="form-control" style="width: 700px" value="{{$sli->slider_name}}">
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh*</label>
                            <input type="file" name="slider_image" placeholder="Hình ảnh" class="form-control"><br>
                            <img src="{{URL::to('public/uploads/slider/'.$sli->slider_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label>Mô tả slider*</label>
                            <input type="text" name="slider_desc" placeholder="Mô tả slider" class="form-control" style="width: 700px" value="{{$sli->slider_desc}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị*</label>
                        <select name="slider_status" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                        </div>
                        <div class="input-group right">
                            <button>Cập nhật Slider</button>
                        </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </section>   
        </main>
@endsection