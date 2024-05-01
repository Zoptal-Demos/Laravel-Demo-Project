<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/greeting', function () {
    return 'Hello World';
});
Route::post('/register','App\Http\Controllers\RegisterController@register');
Route::post('/verify_otp','App\Http\Controllers\RegisterController@verify_otp');
Route::post('/resend_otp','App\Http\Controllers\RegisterController@resend_otp');

Route::post('/check_session','App\Http\Controllers\ApiController@check_session');

Route::post('/send_message','App\Http\Controllers\SocketController@send_message')->name('send_message');

Route::post('/authenticate','App\Http\Controllers\SocketController@authenticate')->name('authenticate');

Route::post('/get_messages','App\Http\Controllers\SocketController@get_messages')->name('get_messages');

Route::post('/get_inbox','App\Http\Controllers\SocketController@get_inbox')->name('get_inbox');

Route::post('/logout','App\Http\Controllers\RegisterController@logout');

Route::post('/delete_account','App\Http\Controllers\RegisterController@delete_account')->name('delete_account');
