@extends('welcome')
@section('content')
<div class="popular-col-wrap">
        <div class="popular">
            <div class="popula-title">
                <h5>Kết quả tìm kiếm</h5>
            </div>
        </div>
                <div class="row">
                    @foreach($search_product as $key => $search) 
                    <div class="col-3" id="popular-box">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$search->product_id)}}" style="color: black; text-decoration: none">
                            <div class="img-box">
                                <img src="{{URL::to('public/uploads/product/'.$search->product_image)}}" />
                            </div>
                            <div class="text-box">
                                <h4>{{$search->product_name}}</h4>
                                <div class="price">
                                    <span>{{number_format($search->product_price,0,',','.').' '.'VNĐ'}}</span>
                                </div>
                            </div>
                        </a> 
                    </div>
                    @endforeach           
                </div>
</div>
@endsection