@extends('welcome')
@section('content')
<div class="popular-col-wrap">
        <div class="popular">
            <div class="popula-title">
                <h5>Sản phẩm nổi bật</h5>
            </div>
        </div>
                <div class="row">
                    @foreach($all_product as $key => $product)
                    
                    <div class="col-3" id="popular-box">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" style="color: black; text-decoration: none">
                            <div class="img-box">
                                <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" />
                            </div>
                            <div class="text-box">
                                <h4>{{$product->product_name}}</h4>
                                <div class="price">
                                    <span>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</span>
                                </div>
                            </div>
                        </a> 
                    </div> 
                    
                    @endforeach           
                </div>
@endsection