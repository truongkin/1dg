<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
// Route::domain(config('custom.admin_subdomain'))->group(function(){

// });
Route::middleware(['auth' , 'locale','XSS'])->group(function () {
    Route::get('/',function(){return redirect()->route('login');})->name('new');
    Route::get('/new','FrontEnd\NewController@index')->name('new');

    Route::post('/detail-service','FrontEnd\ServiceController@getDetailService')->name('service.detail');
    Route::post('/list-service','FrontEnd\ServiceController@getListServiceByCategory')->name('service.list');
    Route::get('/services','FrontEnd\ServiceController@getAll')->name('service');
    Route::post('/seach-services','FrontEnd\ServiceController@seach')->name('service.seach');
    
    Route::get('/orders','FrontEnd\OrderController@index')->name('order');
    Route::post('/add-order','FrontEnd\OrderController@handleAddOrder')->name('order.addOrder');
    Route::post('/add-orders','FrontEnd\OrderController@handleAddOrders')->name('order.addOrders');
    
    Route::get('/account','FrontEnd\AccountController@account')->name('account');
    Route::post('/change-password','FrontEnd\AccountController@changePassword')->name('account.changePassword');
    Route::post('/get-account','FrontEnd\AccountController@getAccount')->name('account.getAccount');

    Route::post('/get-list-post','FrontEnd\PostController@getListPost')->name('post.getlistpost');

    Route::get('/funds','FrontEnd\FundsController@index')->name('funds');

    Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('home.change-language');

    Route::post('get-bank', 'FrontEnd\BankController@get')->name('bank.getAll');
    Route::post('get-one-bank', 'FrontEnd\BankController@getOne')->name('bank.getOne');
});




$GLOBALS['status'] = array(
    '1'=>array('name'=>'Đang chờ xử lý btn' , 'color'=>"btn-primary" ,'color2'=>"primary"),
    '2'=>array('name'=>'Đang chạy btn' , 'color'=>"btn-primary",'color2'=>"primary"),
    '3'=>array('name'=>'Đang xử lý btn' , 'color'=>"btn-info" ,'color2'=>"info"),
    '4'=>array('name'=>'Hoàn thành btn' , 'color'=>"btn-success",'color2'=>"success"),
    '5'=>array('name'=>'Hoàn tiền một phần btn' , 'color'=>"btn-danger",'color2'=>"danger"),
    '6'=>array('name'=>'Hủy đơn hàng btn' , 'color'=>"btn-warning",'color2'=>"warning"),
);

