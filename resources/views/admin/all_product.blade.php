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
                <h3>Liệt kê sản phẩm</h3>
          
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
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá bán</th>
                            <th>Giá gốc</th>
                            <th>Hình sản phẩm</th>
                            <th>Danh mục sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Hiển thị</th>
                            <th>Sửa/Xóa</th>
                        </tr>
                    </thead>
                <tbody>
                @foreach($all_product as $key => $pro)
                <tr>
                    <td>{{ $pro->product_name }}</td>
                    <td>{{ $pro->product_quantity }}</td>
                    <td>{{number_format($pro->product_price,0,',','.').' '.'VNĐ'}}</td>
                    <td>{{number_format($pro->price_cost,0,',','.').' '.'VNĐ'}}</td>
                    <td><img src="public/uploads/product/{{ $pro->product_image }}" width="100px" height="100px"></td>
                    <td>{{ $pro->category_name }}</td>
                    <td>{{ $pro->product_desc }}</td>
                    <td>
                        <span class="text-ellipsis">
                        <?php
                            if($pro->product_status==0){
                        ?>
                            <a href="{{ URL::to('/unactive-product/'.$pro->product_id) }}"><i class="ti-close" aria-hidden="true"></i></a>
                        <?php
                            }else{
                        ?>
                            <a href="{{ URL::to('/active-product/'.$pro->product_id) }}"><i class="ti-check" aria-hidden="true"></i></a>
                        <?php
                            }
                        ?>
                        </span>
                    </td>
                    <td>
                        <a href="{{ URL::to('/edit-product/'.$pro->product_id) }}" ui-toggle-class="">
                        <i class="ti-pencil"></i>
                        </a>
                        <a a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{ URL::to('/delete-product/'.$pro->product_id) }}" ui-toggle-class="">
                        <i class="ti-trash"></i>
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
        
            {{-- <table border="1" style="width: 200px">
                <tr>
                    <td>
                        <form action="{{url('/import-csv-product')}}" method="POST" enctype="multipart/form-data">
                          @csrf
                        <input type="file" name="file" accept=".xlsx" style="margin-left: 10px"><br>
                        <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
                        </form>
                    </td>
                </tr>
            </table> --}}
        
        <form action="{{url('/export-csv-product')}}" method="POST" style="padding-left: 15px">
          @csrf
        <input type="submit" value="In file Excel" name="export_csv" class="btn btn-success">
      </form>
      </div>
    </div>
  </div>
</div>
</main>
@endsection