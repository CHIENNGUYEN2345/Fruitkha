<?php

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

//------------frontend-------------
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::post('/tim-kiem','HomeController@search');

//product //brand
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
Route::get('/chi-tiet-san-pham/{product_id}','CategoryProduct@show_details_product');
//cart
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::get('/gio-hang','CartController@gio_hang');
Route::post('/update-cart','CartController@update_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-all-product','CartController@delete_all_product');
//Check-out
Route::get('/checkout','CheckoutController@checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::get('/confirm-customer','CheckoutController@confirm_customer');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');
Route::get('/payment','CheckoutController@payment');

// Route::post('/confirm-order','CheckoutController@confirm_order');
//Login-logout to checkout
Route::get('/home-login','CheckoutController@home_login');
Route::post('/login-checkout-post','CheckoutController@login_checkout_post');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
//Coupon
Route::post('/check-coupon','CouponController@check_coupon');

//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');
Route::get('/news','PostController@all_news');

//------------backend--------------
//admin
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/dang-nhap','AdminController@login_checkout');

//mail
Route::get('/send-mail','MailController@send_mail');
Route::get('/quen-mat-khau','MailController@quen_mat_khau');
Route::get('/recover-pass','MailController@recover_pass');

//cate
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');
Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::post('/save-category-product','CategoryProduct@save_category_product');

//brand
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');
Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::post('/save-brand-product','BrandProduct@save_brand_product');

//product
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::get('/active-product/{product_id}','ProductController@active_product');
Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::post('/save-product','ProductController@save_product');

//order
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{orderId}','CheckoutController@view_order');

//coupon (admin dashboard)
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::post('/insert-coupon-post','CouponController@insert_coupon_post');
Route::get('/list-coupon','CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');

//delivery - quản lý phí ship dựa theo tỉnh thành
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');
Route::post('/calculate-fee','CheckoutController@calculate_fee');
Route::get('/del-fee','CheckoutController@del_fee');
Route::get('/del-coupon-frontend','CheckoutController@del_coupon_frontend');

//-----post
Route::get('/add-category-post','CategoryPost@add_category_post');
Route::post('/save-category-post','CategoryPost@save_category_post');
Route::get('/all-category-post','CategoryPost@all_category_post');
Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post');
Route::get('/danh-muc-bai-viet/{cate_post_slug}','CategoryPost@danh_muc_bai_viet');
Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post');
Route::get('/add-post','PostController@add_post');
Route::post('/save-post','PostController@save_post');
Route::get('/all-post','PostController@all_post');
Route::get('/delete-post/{post_id}','PostController@delete_post');
Route::get('/edit-post/{post_id}','PostController@edit_post');
Route::post('/update-post/{post_id}','PostController@update_post');