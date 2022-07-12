<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
class SliderController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function manage_slider(){
        $all_slide = Slider::orderBy('slider_id','DESC')->get();
        return view('admin.list_slider')->with(compact('all_slide'));
    }
    public function add_slider(){
        return view('admin.add_slider');
    }
    public function unactive_slide($slide_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>0]);
        Session::put('message','Hủy kích hoạt slider thành công');
        return Redirect::to('manage-slider');

    }
    public function active_slide($slide_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>1]);
        Session::put('message','Kích hoạt slider thành công');
        return Redirect::to('manage-slider');

    }

    public function insert_slider(Request $request){
        
        $this->AuthLogin();

        $data = $request->all();
        $get_image = request('slider_image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider', $new_image);

            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->save();
            Session::put('message','Thêm slider thành công');
            return Redirect::to('add-slider');
        }else{
            Session::put('message','Làm ơn thêm hình ảnh');
            return Redirect::to('add-slider');
        }
    }
    public function delete_slider($slide_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->delete();
        Session::put('message','Xóa slider thành công');
        return Redirect::to('manage-slider');
    }
    public function edit_slider($slider_id){
        $this->AuthLogin();
        $edit_slider = DB::table('tbl_slider')->where('slider_id',$slider_id)->get();
        $manager_slider = view('admin.edit_slider')->with('edit_slider',$edit_slider);
        return view('admin.admin_layout')->with('admin.edit_slider', $manager_slider);
    }
    public function update_slider(Request $request,$slider_id){
        $this->AuthLogin();
        $data = array();
        $data['slider_name'] = $request->slider_name;
        $data['slider_status'] = $request->slider_status;
        $data['slider_desc'] = $request->slider_desc;
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $data['slider_image'] = $new_image;
            DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
            Session::put('message','Cập nhật slide thành công');
            return Redirect::to('manage-slider');
        }
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update($data);
        Session::put('message','Cập nhật slide thành công');
        return Redirect::to('manage-slider');
    }
}
