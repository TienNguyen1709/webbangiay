<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

class CartController extends Controller
{
    public function show_cart_quantity(){
        $cart = count(Session::get('cart'));
        $output = '';
        $output.='<a href="'.url('/gio-hang').'" class="notification"><span class="badge">'.$cart.'</span><i class="fas fa-shopping-cart"></i></a>';
        echo $output;
    }
    public function gio_hang(){
        $cate_product = DB::table('tbl_category')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('cart_ajax')->with('category', $cate_product);
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }   
        Session::save();
    }  
    public function delete_cart($session_id){
        $cart = Session::get('cart');
        if($cart==true){
        foreach($cart as $key => $val){
            if($val['session_id']==$session_id){
                unset($cart[$key]);
            }
        }
        Session::put('cart',$cart);
        return redirect()->back()->with('message','X??a s???n ph???m th??nh c??ng');

    }else{
        return redirect()->back()->with('message','X??a s???n ph???m th???t b???i');
    }
    }
    public function update_cart(Request $request){
    $data = $request->all();
    $cart = Session::get('cart');
    if($cart==true){
        foreach($data['cart_qty'] as $key => $qty){
            foreach($cart as $session => $val){
                if($val['session_id']==$key){
                    $cart[$session]['product_qty'] = $qty;
                }
            }
        }
        Session::put('cart',$cart);
        return redirect()->back()->with('message','C???p nh???t s??? l?????ng th??nh c??ng');
    }else{
        return redirect()->back()->with('message','C???p nh???t s??? l?????ng th???t b???i');
    }
    }
    
    public function delete_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            // Session::destroy();
            Session::forget('cart');
            return redirect()->back()->with('message','X??a h???t gi??? th??nh c??ng');
        }
    }
}
