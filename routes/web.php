<?php

use Illuminate\Support\Facades\Route;
use App\Models\category;
use Illuminate\Support\Facades\Auth;

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
////GUEST

//Route::get('/', 'HomeController@index')->name('home');

    Auth::routes();
//// ADMIN
///
//Route::domain('admin.localhost')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'Auth\AdminLoginController@login')->name("loginadmin");
        Route::post('/logoutadmin', 'Auth\AdminLoginController@logout')->name('logoutadmin');
        Route::post('/postloginadmin', 'Auth\AdminLoginController@postlogin')->name('postloginadmin');
        Route::resource('/news', 'Backend\NewsController', [
            'name' => [
                'index' => 'new.index'
            ]
        ]);
        Route::middleware(['authadmin',"XSS"])->group(function () {
            Route::post('/updaterefund', 'Backend\HomeController@updateRefun')->name('uprefund');
            Route::post('/updateamountstart', 'Backend\HomeController@updateAmountstart')->name('upamountstart');
            Route::post('/updatestatus', 'Backend\HomeController@updatestatus')->name('upstatus');
            Route::post('/updateamountcom', 'Backend\HomeController@updateamountcom')->name('upamountcom');
            Route::resource('home', 'Backend\HomeController', [
                'name' => [
                    'index' => 'home.index',
                ]
            ]);
            Route::resource('service', 'Backend\ServiceController', [
                'name' => [
                    'index' => 'service.index',
//                'store' =>  'service.store',
                ]
            ]);
            Route::resource('/category', 'Backend\CategoryController', [
                'name' => [
                    'index' => 'category.index'
                ]
            ]);
            Route::resource('/level', 'Backend\LevelController', [
                'name' => [
                    'index' => 'level.index'
                ]
            ]);
            Route::resource('/recharge', 'Backend\RechargeController', [
                'name' => [
                    'index' => 'recharge.index'
                ]
            ]);

            Route::resource('/changerpass', 'Backend\ChangerPasswordController');
            Route::resource('/bank', 'Backend\BankController', [
                'name' => [
                    'index' => 'bank.index'
                ]
            ]);
            Route::resource('/user', 'Backend\UserController', [
                'name' => [
                    'index' => 'user.index'
                ]
            ]);
            Route::post('/user-change-password', 'Backend\UserController@changePass');
            Route::post('/check-password', 'Backend\ChangerPasswordController@checkpass');
        });
    });
//});
//// USER




