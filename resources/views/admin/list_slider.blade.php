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
                <h3>Liệt kê Slide</h3>
          
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
                            <th>Tên slide</th>
                            <th>Hình ảnh</th>
                            <th>Mô tả</th>
                            <th>Hiển thị</th>
                            <th></th>
                        </tr>
                    </thead>
                <tbody>
                @foreach($all_slide as $key => $slide)
                <tr>
                    <td>{{ $slide->slider_name }}</td>
                    <td><img src="public/uploads/slider/{{ $slide->slider_image }}" height="120" width="500"></td>
                    <td>{{ $slide->slider_desc }}</td>
                    <td>
                        <span class="text-ellipsis">
                        <?php
                            if($slide->slider_status==1){
                        ?>
                            <a href="{{ URL::to('/unactive-slide/'.$slide->slider_id) }}"><i class="ti-check" aria-hidden="true"></i></a>
                        <?php
                            }else{
                        ?>
                            <a href="{{ URL::to('/active-slide/'.$slide->slider_id) }}"><i class="ti-close" aria-hidden="true"></i></a>
                        <?php
                            }
                        ?>
                        </span>
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-slider/'.$slide->slider_id)}}" ui-toggle-class="">Sửa slide</a>
                        <a onclick="return confirm('Bạn có chắc là muốn xóa ko?')" href="{{URL::to('/delete-slider/'.$slide->slider_id)}}" ui-toggle-class="">
                        Xóa slide
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