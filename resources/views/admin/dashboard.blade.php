@extends('admin.admin_layout')
@section('admin_content')
<header>
            {{-- <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Tìm Kiếm">
            </div>
             --}}
        <style type="text/css">
                p.title_thongke {
                    text-align: center;
                    font-size: 20px;
                    font-weight: bold;
                }
        </style>   
</header>
        
        <main>                      
            <section class="recent">
                <div class="activity-grid">
                    <div class="activity-card">
                        <h3>Chào mừng đến với trang quản lý</h3>
                            <div class="row">
                                <form autocomplete="off">
                                    @csrf
                                    <div class="col-md-2">
                                        Từ ngày: <input type="text" id="datepicker" class="form-control">
                                        Đến ngày: <input type="text" id="datepicker2" class="form-control">
                                        Lọc theo: 
                                            <select class="dashboard-filter form-control" >
                                                <option>--Chọn--</option>
                                                <option value="7ngay">7 ngày qua</option>
                                                <option value="thangtruoc">tháng trước</option>
                                                <option value="thangnay">tháng này</option>
                                                <option value="365ngayqua">365 ngày qua</option>
                                            </select>
                                        <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả">
                                    </div>
                                </form>
                                <div class="col-md-12">
                                    <div id="chart"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </section>   
        </main> 
@endsection