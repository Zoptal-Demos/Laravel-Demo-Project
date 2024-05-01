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

Route::get('/', function () {
    return view('welcome');
});
/* Admin Login */
Route::get('/login','App\Http\Controllers\LoginController@loginpage')->name('loginpage');
Route::post('/login','App\Http\Controllers\LoginController@login')->name('login');
Route::get('/forgot_password','App\Http\Controllers\LoginController@forgot_password')->name('forgot_password');
Route::post('/forgot_password','App\Http\Controllers\LoginController@forgot_password_action')->name('forgot_password_action');

/* Admin panel */
Route::get('/admin','App\Http\Controllers\AdminController@index')->name('adminindex')->middleware('auth');

/* Vehicle types */
Route::get('/admin/add_vehicle','App\Http\Controllers\AdminController@add_vehicle')->name('add_vehicle')->middleware('auth');
Route::post('/admin/add_vehicle','App\Http\Controllers\AdminController@store_vehicle')->name('store_vehicle')->middleware('auth');
Route::get('/admin/show_vehicle','App\Http\Controllers\AdminController@show_vehicle')->name('show_vehicle')->middleware('auth');
Route::get('/admin/show_vehicle_api','App\Http\Controllers\AdminController@show_vehicle_api')->name('show_vehicle_api')->middleware('auth');
Route::get('/admin/enable_vehicle/{vehicle_id}','App\Http\Controllers\AdminController@enable_vehicle')->name('enable_vehicle')->middleware('auth');
Route::get('/admin/disable_vehicle/{vehicle_id}','App\Http\Controllers\AdminController@disable_vehicle')->name('disable_vehicle')->middleware('auth');
Route::get('/admin/edit_vehicle/{vehicle_id}','App\Http\Controllers\AdminController@edit_vehicle')->name('edit_vehicle')->middleware('auth');

/* Goods Management */

Route::get('/admin/add_goods','App\Http\Controllers\AdminController@add_goods')->name('add_goods')->middleware('auth');
Route::post('/admin/add_goods','App\Http\Controllers\AdminController@store_goods')->name('store_goods')->middleware('auth');
Route::get('/admin/edit_goods/{goods_id}','App\Http\Controllers\AdminController@edit_goods')->name('edit_goods')->middleware('auth');
Route::post('/admin/edit_goods','App\Http\Controllers\AdminController@store_goods')->name('update_goods')->middleware('auth');
Route::get('/admin/show_goods','App\Http\Controllers\AdminController@show_goods')->name('show_goods')->middleware('auth');
Route::get('/admin/delete_goods/{goods_id}','App\Http\Controllers\AdminController@delete_goods')->name('delete_goods')->middleware('auth');

Route::get('/admin/show_goods_test','App\Http\Controllers\AdminController@show_goods_test')->name('show_goods_test')->middleware('auth');
Route::get('/admin/show_goods_api','App\Http\Controllers\AdminController@show_goods_api')->name('show_goods_api')->middleware('auth');

/* Users & Agents management */

Route::get('/admin/show_users','App\Http\Controllers\AdminController@show_users')->name('show_users')->middleware('auth');
Route::post('/admin/show_users','App\Http\Controllers\AdminController@show_users')->middleware('auth');
Route::get('/admin/show_users_test','App\Http\Controllers\AdminController@show_users_test')->name('show_users_test')->middleware('auth');
Route::get('/admin/show_users_api','App\Http\Controllers\AdminController@show_users_api')->name('show_users_api')->middleware('auth');
Route::get('/admin/show_agents','App\Http\Controllers\AdminController@show_agents')->name('show_agents')->middleware('auth');

/* Orders Management */

Route::get('/admin/all_orders','App\Http\Controllers\AdminController@all_orders')->name('all_orders')->middleware('auth');

Route::get('/admin/all_orders_test','App\Http\Controllers\AdminController@all_orders_test')->name('all_orders_test')->middleware('auth');

Route::get('/admin/all_orders_api','App\Http\Controllers\AdminController@all_orders_api')->name('all_orders_api')->middleware('auth');

Route::get('/admin/pending_orders','App\Http\Controllers\AdminController@pending_orders')->name('pending_orders')->middleware('auth');

Route::get('/admin/pending_orders_api','App\Http\Controllers\AdminController@pending_orders_api')->name('pending_orders_api')->middleware('auth');

Route::get('/admin/accepted_orders','App\Http\Controllers\AdminController@accepted_orders')->name('accepted_orders')->middleware('auth');

Route::get('/admin/accepted_orders_api','App\Http\Controllers\AdminController@accepted_orders_api')->name('accepted_orders_api')->middleware('auth');

Route::get('/admin/denied_orders','App\Http\Controllers\AdminController@denied_orders')->name('denied_orders')->middleware('auth');

Route::get('/admin/denied_orders_api','App\Http\Controllers\AdminController@denied_orders_api')->name('denied_orders_api')->middleware('auth');

Route::get('/admin/cancelled_orders','App\Http\Controllers\AdminController@cancelled_orders')->name('cancelled_orders')->middleware('auth');

Route::get('/admin/cancelled_orders_api','App\Http\Controllers\AdminController@cancelled_orders_api')->name('cancelled_orders_api')->middleware('auth');

Route::get('/admin/completed_orders','App\Http\Controllers\AdminController@completed_orders')->name('completed_orders')->middleware('auth');

Route::get('/admin/completed_orders_api','App\Http\Controllers\AdminController@completed_orders_api')->name('completed_orders_api')->middleware('auth');

Route::get('/admin/accept_order/{order_id}','App\Http\Controllers\AdminController@accept_order')->name('accept_order')->middleware('auth');

Route::get('/admin/deny_order/{order_id}','App\Http\Controllers\AdminController@deny_order')->name('deny_order')->middleware('auth');

/* Content Management */

Route::get('/admin/privacy_policy','App\Http\Controllers\AdminController@privacy_policy')->name('privacy_policy')->middleware('auth');

Route::post('/admin/privacy_policy','App\Http\Controllers\AdminController@update_privacy_policy')->name('update_privacy_policy')->middleware('auth');

Route::get('/admin/terms','App\Http\Controllers\AdminController@terms_condition')->name('terms_condition')->middleware('auth');

Route::post('/admin/terms','App\Http\Controllers\AdminController@update_terms')->name('update_terms')->middleware('auth');

Route::get('/privacy_policy','App\Http\Controllers\AdminController@show_privacy_policy')->name('show_privacy_policy');

Route::get('/terms','App\Http\Controllers\AdminController@show_terms')->name('show_terms');

Route::get('/admin/agency_profile','App\Http\Controllers\AdminController@agency_profile')->name('agency_profile')->middleware('auth');

Route::post('/admin/agency_profile','App\Http\Controllers\AdminController@update_agency_profile')->name('update_agency_profile')->middleware('auth');

Route::get('/admin/add_faq','App\Http\Controllers\AdminController@add_faq')->name('add_faq')->middleware('auth');

Route::post('/admin/add_faq','App\Http\Controllers\AdminController@store_faq')->name('store_faq')->middleware('auth');

Route::post('/admin/edit_faq','App\Http\Controllers\AdminController@store_faq')->name('store_edit_faq')->middleware('auth');

Route::get('/admin/edit_faq','App\Http\Controllers\AdminController@edit_faq')->name('edit_faq')->middleware('auth');

Route::get('/admin/show_faq','App\Http\Controllers\AdminController@show_faq')->name('show_faq')->middleware('auth');

Route::get('/admin/show_faq_api','App\Http\Controllers\AdminController@show_faq_api')->name('show_faq_api')->middleware('auth');

Route::get('/admin/delete_faq','App\Http\Controllers\AdminController@delete_faq')->name('delete_faq')->middleware('auth');

Route::get('/admin/notification_test','App\Http\Controllers\AdminController@notification_test')->name('notification_test');

/* Update profile */

Route::get('/update_profile','App\Http\Controllers\AdminController@update_profile')->name('update_profile')->middleware('auth');

Route::post('/update_profile','App\Http\Controllers\AdminController@store_profile')->name('store_profile')->middleware('auth');

/* Logout */

Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');

Route::get('/admin/test','App\Http\Controllers\AdminController@test')->name('test');


