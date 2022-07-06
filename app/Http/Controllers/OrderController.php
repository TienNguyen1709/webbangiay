<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Statistic;
use App\Models\Slider;
use PDF;
use DB;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function update_qty(Request $request){
        $data = $request->all();
        $order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
    }
    public function update_order_qty(Request $request){
        //update order
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        //order date
        $order_date = $order->order_date;   
        
        $statistic = Statistic::where('order_date',$order_date)->get();
        if($statistic){
            $statistic_count = $statistic->count(); 
        }else{
            $statistic_count = 0;
        }   

        if($order->order_status==2){
            //them
            $total_order = 0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;

            foreach($data['order_product_id'] as $key => $product_id){

                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                //them
                $product_price = $product->product_price;
                $price_cost = $product->price_cost;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

                foreach($data['quantity'] as $key2 => $qty){

                    if($key==$key2){
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                        //update doanh thu
                        $quantity+=$qty;
                        $total_order+=1;
                        $sales+=$product_price*$qty;
                        $profit = $sales - ($price_cost*$qty);
                    }

                }
            }
            //update doanh so db
            if($statistic_count>0){
                $statistic_update = Statistic::where('order_date',$order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit =  $statistic_update->profit + $profit;
                $statistic_update->quantity =  $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();

            }else{

                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit =  $profit;
                $statistic_new->quantity =  $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }



        }


    }
    public function manager_order(){
        $this->AuthLogin();
        $order = Order::orderby('created_at','DESC')->get();
        return view('admin.manager_order')->with(compact('order'));
    }
    public function view_order($order_code){
        $this->AuthLogin();
        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key => $ord){
            $id = $ord->id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('id',$id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();

        $order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();

        foreach($order_details_product as $key => $od){
            $product_coupon = $od->product_coupon;
        }
        
        if($product_coupon!='Ko'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;   
        }

        return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order','order_status'));
    }
    public function delete_order(Request $request ,$order_code){
        $order = Order::where('order_code',$order_code)->first();
        $order_details = OrderDetails::where('order_code',$order_code)->first();
        $order->delete();
        $order_details->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();
    }
    public function history(Request $request){
        if(!Session::get('id')){
            return redirect('dang-nhap')->with('error','Vui lòng đăng nhập để xem lịch sử mua hàng');
        }else{

            
            // //category post
            // $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

            
            $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get(); 
            
            $getorder = Order::where('id',Session::get('id'))->orderby('order_id','DESC')->get();

            return view('history')->with('category',$cate_product)->with('getorder',$getorder); //1
        }
    }
    public function view_history_order(Request $request,$order_code){
        if(!Session::get('id')){
            return redirect('dang-nhap')->with('error','Vui lòng đăng nhập để xem lịch sử mua hàng');
        }else{

            
            // //category post
            // $category_post = CatePost::orderBy('cate_post_id','DESC')->get();

            $getorder = Order::where('id',Session::get('id'))->orderby('order_id','DESC')->get();
            $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();  

            $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
            $order = Order::where('order_code',$order_code)->get();
            foreach($order as $key => $ord){
                $id = $ord->id;
                $shipping_id = $ord->shipping_id;
                $order_status = $ord->order_status;
            }
            $customer = Customer::where('id',$id)->first();
            $shipping = Shipping::where('shipping_id',$shipping_id)->first();

            $order_details_product = OrderDetails::with('product')->where('order_code',$order_code)->get();

            foreach($order_details_product as $key => $od){
                $product_coupon = $od->product_coupon;
            }
            
            if($product_coupon!='Ko'){
                $coupon = Coupon::where('coupon_code',$product_coupon)->first();
                $coupon_condition = $coupon->coupon_condition;
                $coupon_number = $coupon->coupon_number;
            }else{
                $coupon_condition = 2;
                $coupon_number = 0;   
            }

            return view('view_history_order')->with('category',$cate_product)->with('order_details',$order_details)->with('customer',$customer)->with('shipping',$shipping)->with('coupon_condition',$coupon_condition)->with('coupon_number',$coupon_number)->with('order',$order)->with('order_status',$order_status)->with('order_code',$order_code)->with('getorder',$getorder);
        }
    }
    public function huy_don_hang(Request $request){
        $data = $request->all();
        $order = Order::where('order_code',$data['order_code'])->first();

        $order->order_cancel = $data['lydo'];
        $order->order_status = 3;
        $order->save(); 
    }
}
