<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Mail;
use Carbon\Carbon;
session_start();

class CheckoutController extends Controller
{
    public function confirm_order(Request $request){
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order();
        $order->id = Session::get('id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set("Asia/Bangkok");
        $order_date = Carbon::now('Asia/Bangkok')->format('Y-m-d');
        $order->created_at = now();
        $order->order_date = $order_date;
        $order->save();

        
        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->save();
            }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
    public function checkout(){
        $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('show_checkout')->with('category', $cate_product);
    }
    public function dangky(){
        return view('dangky');
    }
    public function post_dangky(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['phone'] = $request->phone;
        
        $id = DB::table('users')->insertGetId($data);

        Session::put('id',$id);
        Session::put('email',$request->email);
        return Redirect('/trang-chu');
        
    }
    public function dangxuat(){
        Session::flush();
        return Redirect('/dang-nhap');
    }
    public function dangnhap(){
        return view('dangnhap');
    }
    public function post_dangnhap(Request $request){
        $email = $request->email;
        $password = md5($request->password);

        $result = DB::table('users')->where('email',$email)->where('password',$password)->first();
        if($result){
                Session::put('id',$result->id);
                return Redirect::to('/trang-chu');
        }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai.Làm ơn nhập lại');
                return Redirect::to('/dang-nhap');
        }
        
    }
    public function order_place(Request $request){
        //phuong thuc thanh toan
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //order
        $order_data = array();
        $order_data['id'] = Session::get('id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        
        Cart::destroy();
        $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('handcash')->with('category', $cate_product);
        /*return Redirect::to('/payment');*/

    }
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function delete_order($order_id){
        $this->AuthLogin();
        DB::table('tbl_order')->where('order_id',$order_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('manager-order');
    }
    public function handcash(){
        $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('handcash')->with('category', $cate_product);
    }
}
