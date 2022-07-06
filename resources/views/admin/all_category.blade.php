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
        <div class="">
            <div class="activity-card">
                <h3>Liệt kê danh mục sản phẩm</h3>
          
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
                            <th>Tên danh mục</th>
                            <th>Hiển thị(nhấn vào biểu tượng để sửa đổi)</th>
                            <th>Mô tả</th>
                            <th>Sửa/Xóa</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach($all_category as $key => $cate_pro)
                <tr>
                    <td>{{ $cate_pro->category_name }}</td>
                    <td>
                    <span class="text-ellipsis">
                        <?php
                            if($cate_pro->category_status==0){
                        ?>
                            <a href="{{ URL::to('/unactive-category-product/'.$cate_pro->category_id) }}"><i class="ti-close" aria-hidden="true"></i></a>
                        <?php
                            }else{
                        ?>
                            <a href="{{ URL::to('/active-category-product/'.$cate_pro->category_id) }}"><i class="ti-check" aria-hidden="true"></i></a>
                        <?php
                            }
                        ?>
                    </span>
                    </td>
                    <td>{{ $cate_pro->category_desc }}</td>
                    <td>        
                <a href="{{ URL::to('/edit-category-product/'.$cate_pro->category_id) }}" ui-toggle-class="">
                    <i class="ti-pencil"></i>
                </a>
                <a a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này ko?')" href="{{ URL::to('/delete-category-product/'.$cate_pro->category_id) }}" ui-toggle-class="">
                    <i class="ti-trash"></i>
                </a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
        {{-- <table border="1" style="width: 200px">
            <tr>
                <td>
                <form action="{{url('/import-csv')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <input type="file" name="file" accept=".xlsx" style="margin-left: 10px"><br>
               <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
                </form>
                </td>
            </tr>
        </table> --}}
       <form action="{{url('/export-csv')}}" method="POST" style="padding-left: 15px">
          @csrf
       <input type="submit" value="In file Excel" name="export_csv" class="btn btn-success">
      </form>

      </div>
    </div>
  </div>
</div>
</main>
@endsection