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
Auth::routes([
    'reset'=>false,
    'register' => false,
    'confirm' => false,
    'verify' => false
]);
Route::group(['namespace' => 'App\Http\Controllers'],function (){

    Route::group(['middleware' => 'auth',
        'namespace' => 'Admin',
        'prefix' => 'admin'], function (){
        Route::group(['middleware' => 'is_admin'],function (){
            Route::get('/','HomeController@index')->name('home');
        });
        Route::resource('categories','CategoryController');
        Route::resource('products','ProductController');
        Route::resource('events','EventController');

        Route::get('/car','HomeController@car')->name('adminCar');
        Route::get('/helpCar/{parent_id}','HomeController@helpCar')->name('adminHelpCar');
        Route::get('/helpCarProduct/{parent_id}','HomeController@helpCarProduct')->name('adminHelpCarProduct');
    });
    Route::get('/','MainController@index')->name('index');
    Route::get('/{category}/{product}','MainController@product')->name('product');
    Route::get('/categories','MainController@categories')->name('categories');
    Route::get('/categories/{category}/{id}','MainController@category')->name('category');

    Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
});

