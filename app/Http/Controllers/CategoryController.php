<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Imports\Imports;
use App\Exports\Exports;
use Excel;
use App\Models\CategoryProduct;
use App\Models\Slider;
session_start();

class CategoryController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
    	return view('admin.add_category');
    }
    public function all_category_product(){
        $this->AuthLogin();
    	$all_category = DB::table('tbl_category')->get();
    	$manager_category_product = view('admin.all_category')->with('all_category',$all_category);
    	return view('admin.admin_layout')->with('admin.all_category', $manager_category_product);
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_desc'] = $request->category_desc;
    	$data['category_status'] = $request->category_status;

    	DB::table('tbl_category')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('add-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    	Session::put('message','Kích hoạt thành công');
    	return Redirect::to('all-category-product');

    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    	Session::put('message','Hủy kích hoạt thành công');
    	return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
    	$edit_category_product = DB::table('tbl_category')->where('category_id',$category_product_id)->get();
    	$manager_category_product = view('admin.edit_category')->with('edit_category_product',$edit_category_product);
        return view('admin.admin_layout')->with('admin.edit_category', $manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request->category_name;
    	$data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

    	DB::table('tbl_category')->where('category_id',$category_product_id)->update($data);
    	Session::put('message','Cập nhật danh mục sản phẩm thành công');
    	return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function export_csv(){
        return Excel::download(new Exports , 'category.xlsx');
    }
    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new Imports, $path);
        return back();
    }
    //End admin page
    public function show_category($category_id){
        $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','3')->take(4)->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')->where('tbl_product.category_id',$category_id)->where('product_status','1')->orderby('product_id','desc')->get();

        return view('show_category')->with('category', $cate_product)->with('category_by_id', $category_by_id)->with('slider',$slider);
    }
}
