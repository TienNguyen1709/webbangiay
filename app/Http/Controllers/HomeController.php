<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;	
use App\Models\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
    	$cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();

    	$all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(8)->get();
        
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

    	return view('content')->with('category', $cate_product)->with('all_product', $all_product)->with('slider',$slider);
    }
    public function search(Request $request){
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','3')->take(4)->get();

        return view('search')->with('category',$cate_product)->with('search_product',$search_product)->with('slider',$slider);
    }
}
