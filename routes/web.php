<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//frontend
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/trang-chu','App\Http\Controllers\HomeController@index');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');

//Hien thi danh muc va thuong hieu
Route::get('/danh-muc-san-pham/{category_id}','App\Http\Controllers\CategoryController@show_category' );
Route::get('/chi-tiet-san-pham/{product_id}','App\Http\Controllers\ProductController@detail_product');


//backend
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::post('/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');
Route::post('/days-order','App\Http\Controllers\AdminController@days_order');
Route::post('/dashboard-filter','App\Http\Controllers\AdminController@dashboard_filter');
Route::get('/order-date','App\Http\Controllers\AdminController@order_date');


//category product
Route::get('/add-category-product','App\Http\Controllers\CategoryController@add_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryController@all_category_product');

Route::get('/unactive-category-product/{category_product_id}','App\Http\Controllers\CategoryController@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','App\Http\Controllers\CategoryController@active_category_product');

Route::get('/edit-category-product/{category_product_id}','App\Http\Controllers\CategoryController@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','App\Http\Controllers\CategoryController@delete_category_product');


Route::post('/save-category-product','App\Http\Controllers\CategoryController@save_category_product');
Route::post('/update-category-product/{category_product_id}','App\Http\Controllers\CategoryController@update_category_product');

Route::post('/export-csv','App\Http\Controllers\CategoryController@export_csv');
Route::post('/import-csv','App\Http\Controllers\CategoryController@import_csv');



//product
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');

Route::get('/unactive-product/{product_id}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}','App\Http\Controllers\ProductController@active_product');

Route::get('/edit-product/{product_id}','App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{product_id}','App\Http\Controllers\ProductController@delete_product');


Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}','App\Http\Controllers\ProductController@update_product');

Route::post('/export-csv-product','App\Http\Controllers\ProductController@export_csv_product');
Route::post('/import-csv-product','App\Http\Controllers\ProductController@import_csv_product');

//Gio hang
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/gio-hang','App\Http\Controllers\CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::get('/delete-cart/{session_id}','App\Http\Controllers\CartController@delete_cart');
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/del-all-product','App\Http\Controllers\CartController@delete_all_product');
Route::get('/show-cart-quantity','App\Http\Controllers\CartController@show_cart_quantity');

//Checkout
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::post('/save-checkout','App\Http\Controllers\CheckoutController@save_checkout');
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');
Route::get('/dang-ky','App\Http\Controllers\CheckoutController@dangky');
Route::post('/dang-ky','App\Http\Controllers\CheckoutController@post_dangky');
Route::get('/dang-nhap','App\Http\Controllers\CheckoutController@dangnhap');
Route::post('/dang-nhap','App\Http\Controllers\CheckoutController@post_dangnhap');
Route::get('/dang-xuat','App\Http\Controllers\CheckoutController@dangxuat');
Route::get('/hand-cash','App\Http\Controllers\CheckoutController@handcash');
Route::post('/confirm-order','App\Http\Controllers\CheckoutController@confirm_order');

//Quan ly don hang
Route::get('/manager-order','App\Http\Controllers\OrderController@manager_order');
Route::get('/view-order/{order_code}','App\Http\Controllers\OrderController@view_order');
Route::get('/delete-order/{order_code}','App\Http\Controllers\OrderController@delete_order');
Route::post('/update-order-qty','App\Http\Controllers\OrderController@update_order_qty');
Route::post('/update-qty','App\Http\Controllers\OrderController@update_qty');
Route::get('/history','App\Http\Controllers\OrderController@history');
Route::get('/view-history-order/{order_code}','App\Http\Controllers\OrderController@view_history_order');
Route::post('/huy-don-hang','App\Http\Controllers\OrderController@huy_don_hang');


//Quan ly slider
Route::get('/manage-slider','App\Http\Controllers\SliderController@manage_slider');
Route::get('/add-slider','App\Http\Controllers\SliderController@add_slider');
Route::post('/insert-slider','App\Http\Controllers\SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','App\Http\Controllers\SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','App\Http\Controllers\SliderController@active_slide');
Route::get('/delete-slider/{slide_id}','App\Http\Controllers\SliderController@delete_slider');
Route::get('/edit-slider/{slider_id}','App\Http\Controllers\SliderController@edit_slider');
Route::post('/update-slider/{slider_id}','App\Http\Controllers\SliderController@update_slider');

//Quen mat khau
Route::get('/quen-mat-khau','App\Http\Controllers\MailController@quen_mat_khau');
