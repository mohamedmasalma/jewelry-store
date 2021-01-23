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



//-----------------------ADMIN--------------------------------------------------
 Route::get('admin/home', 'admin\product\productController@index')->name('admin');
 Route::get('admin/all/product', 'admin\product\productController@index')->name('admin.all.product');
 Route::get('admin/create/product', 'admin\product\productController@create')->name('admin.add.product');
  Route::post('admin/edit_display/product', 'admin\product\productController@index_edit')->name('admin.edit_display.product');
 Route::post('admin/store/product', 'admin\product\productController@store')->name('admin.store.product');
 Route::post('/admin/update/pro', 'admin\product\productController@update')->name('admin.update.pro');
 Route::post('/admin/delete/pro', 'admin\product\productController@destroy')->name('admin.delete.pro');
 Route::post('admin/final_deleted/pro', 'admin\product\deletedController@destroy')->name('admin.final.delete.pro');
 Route::post('/admin/edit/pro', 'admin\product\productController@edit')->name('admin.edit.pro');

 Route::get('/admin/deleted/pro', 'admin\product\deletedController@index')->name('admin.deleted.pro');
 Route::post('/admin/retrive/pro', 'admin\product\deletedController@update')->name('admin.retrive.pro');
Route::get('admin/sold', 'admin\sold\soldcontroller@index')->name('admin.sold');
Route::post('admin/sold/delete', 'admin\sold\soldcontroller@destroy')->name('admin.sold.delete');
Route::post('admin/sold/edit', 'admin\sold\soldcontroller@edit')->name('admin.sold.edit');

Route::get('admin/sellprocess', 'admin\sold\processController@index')->name('admin.sold.process');
Route::post('admin/sell/process', 'admin\sold\processController@create')->name('admin.sell.process');

 Route::post('/admin/store/cat', 'admin\cat\catController@store');
 Route::post('/admin/edit/cat', 'admin\cat\catController@edit')->name('admin.edit.cat');
 Route::post('/admin/delete/cat','admin\cat\catController@destroy')->name('admin.delete.cat');
 
 Route::get('admin/all/cat', 'admin\cat\catController@index')->name('admin.all.cat');


 
 //--------------------END ADMIN-------------------------------------------------------


 //------------------------User-----------------------------------------------------
 Route::get('user/home', 'user\homeController@index')->name('user.home');
 Route::get('user/shop', 'user\homeController@shop')->name('user.shop');
 Route::get('user/shop/list/{id?}', 'user\homeController@shopList')->name('user.shop.list');
 Route::get('user/portfolio', 'user\homeController@portfolio')->name('user.portfolio');
 Route::get('user/product_details/{id}', 'user\homeController@productDetails')->name('user.product_details');
 Route::get('user/about_us', 'user\homeController@about')->name('user.about');
 Route::get('user/cntact', 'user\homeController@contact')->name('user.contact');