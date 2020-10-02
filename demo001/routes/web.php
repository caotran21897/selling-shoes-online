<?php

use Illuminate\Support\Facades\Route;
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
Auth::routes();
Route::get('add-cart/{id}/{color}/{size}/{qty}','StoreController@addCart');
Route::get('delete-item-cart/{id}','StoreController@deleteItemCart');
Route::get('delete-item-list-cart/{id}','StoreController@deleteListItemCart');
Route::get('save-item-list-cart/{id}/{quantity}','StoreController@saveListItemCart');
Route::get('list-cart','StoreController@viewListCart');
Route::get('checkout','StoreController@checkout');
Route::post('checkout','StoreController@postCheckout');
Route::get('checkout-online/{gd}/{idpay}/{mn}/{up}','StoreController@getCheckoutOnline');
Route::post('checkout-online','StoreController@postCheckoutOnline');




Route::get('getsize/{product_id}/{color_id}','StoreController@getSize');

Route::get('/','StoreController@index')->name('home');
Route::get('/home','StoreController@index')->name('home');

Route::get('user/{id}', 'UserController@profile');


Route::get('login', 'UserController@getLogin')->name('login');
Route::post('login', 'UserController@postLogin');
Route::get('logout', function(){
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::get('search','StoreController@search');
Route::get('contact','StoreController@contact');
Route::get('about','StoreController@about');
Route::group(['prefix' => 'store'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('men', 'StoreController@getMen');
        Route::get('women', 'StoreController@getWomen');
        Route::get('all', 'StoreController@getAll');
        Route::get('detail/{id}', 'StoreController@detail');
    });
    Route::get('brand/{id}','StoreController@getBrand');
});

//chatbox
Route::get('store/chatbox','StoreController@getChatBox');

//admin
Route::get('admin/signin', 'UserController@getSigninAdmin')->name('ad');
Route::post('admin/signin', 'UserController@postSigninAdmin');


Route::group(['prefix' => 'admin','middleware'=>'admin'], function () {
    Route::group(['prefix' => 'products'], function () {
        route::get('list','ProductController@getList');
        Route::post('{id}/updateinfo','ProductController@updateinfo');
        Route::post('{id}/updateprice','ProductController@updateprice');
        Route::post('{id}/addimgcolor','ProductController@addimgcolor');

        route::get('add','ProductController@getAdd');
        route::post('add','ProductController@postAdd');

        Route::get('edit/{id}','ProductController@getEdit');
        Route::post('edit/{id}','ProductController@postEdit');

        Route::get('view/{id}','ProductController@getView');
        Route::get('{id}/addcolor','ProductController@addcolor');
        Route::post('{id}/addcolor','ProductController@postAddcolor');
        Route::get('showtohide/{id}', 'ProductController@showtohide');
        Route::get('hidetoshow/{id}', 'ProductController@hidetoshow');

    });

    Route::group(['prefix' => 'users'], function () {
        route::get('list','UserController@getList');

        route::get('add','UserController@getAdd');
        route::post('add','UserController@postAdd');

        Route::get('edit/{id}', 'UserController@getEdit');
        Route::post('edit/{id}', 'UserController@postEdit');

        Route::get('log/{id}', 'UserController@getLog');

    });

    Route::group(['prefix' => 'bills'], function () {
        route::get('list','BillController@getList');

        // route::get('add','BillController@getAdd');
        // route::post('add','BillController@postAdd');

        // Route::get('edit/{id}', 'BillController@getEdit');
        Route::post('edit/{id}', 'BillController@postEdit');

        Route::get('view/{id}','BillController@getView');

    });

    Route::group(['prefix' => 'salepromotions'], function () {
        route::get('list','SaleController@getList');

        route::get('add','SaleController@getAdd');
        route::post('add','SaleController@postAdd');

        Route::get('edit/{id}', 'SaleController@getEdit');
        Route::post('edit/{id}', 'SaleController@postEdit');

        Route::get('view/{id}','SaleController@getView') ;
        Route::get('add-sale/{id}','SaleController@addsales') ;
        Route::get('del-sale/{id}','SaleController@delsales') ;
        

    });
    
    Route::group(['prefix' => 'goodsreceipts'], function () {
        route::get('list','GoodsreceiptController@getList');

        route::get('add','GoodsreceiptController@getAdd');
        route::post('add','GoodsreceiptController@postAdd');

        Route::get('edit/{id}', 'GoodsreceiptController@getEdit');
        Route::post('edit/{id}', 'GoodsreceiptController@postEdit');
        route::get('view/{id}','GoodsreceiptController@getView');
        Route::get('get_color_from/{id}','GoodsreceiptController@getColor');
        Route::get('get_size_from/{id}/{color}','GoodsreceiptController@getSize');
        Route::get('add-receipt/{id}/{color}/{size}/{qty}/{pri}','GoodsreceiptController@addReceipt');
        Route::get('del-receipt/{id}','GoodsreceiptController@deleteListItemReceipt');

    });
    Route::get('admin/logout', function(){
        Auth::logout();
        return redirect()->route('ad');
    })->name('adminlogout');

    // Route::group(['prefix' => 'sizes'], function () {
    //     route::get('list','SizeController@getList');

    //     route::get('add','SizeController@getAdd');
    //     route::post('add','SizeController@postAdd');

    //     Route::get('edit/{id}', 'SizeController@getEdit');
    //     Route::post('edit/{id}', 'SizeController@postEdit');

    // });
 
    Route::group(['prefix' => 'brands'], function () {
        route::get('list','BrandController@getList');

        // route::get('add','BrandController@getAdd');
        route::post('add','BrandController@postAdd');

        Route::get('edit/{id}', 'BrandController@getEdit');
        Route::post('edit/{id}', 'BrandController@postEdit');

    });
    Route::get('suppliers/list','ProductController@supplierList');
    Route::post('suppliers/add','ProductController@supplierAdd');

    Route::get('colors/list','ProductController@colorList');
    Route::post('colors/add','ProductController@colorAdd');


    Route::get('chart','BillController@getChart');
    Route::get('chartbrand/{date}','BillController@getChartBrand');
    Route::get('chartall/{date}','BillController@getChartAll');
    Route::get('chart-bill-brand/{brand}/{num}','ChartController@chart_bill_brand');
    Route::get('chart/price/{id}','ChartController@getChartPrice');
    Route::get('chart/demo','ChartController@getChartID');
});
Route::get('getquantity/{id}/{color}/{size}','StoreController@getquantity');
Route::get('change-color/{color_id}/{id}','StoreController@changeColor');

Route::get('geta','ChartController@geta');

