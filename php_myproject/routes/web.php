<?php


Route::get('/','Ccontroller@home');
Route::get('login',function(){
	return view('login');
});
Route::get('register',function(){
	return view('register');
});
Route::get('logout','Ccontroller@logout');
Route::post('register','Ccontroller@postRegister');
Route::post('login','Ccontroller@postLogin');
Route::get('search/{type1?}/{menuId?}/{type2?}/{submenuId?}','Ccontroller@search');
Route::post('search/{type1?}/{menuId?}/{type2?}/{submenuId?}','Ccontroller@search');
Route::get('cart', function () {
    return view('cart');
});
Route::get('cart/{action?}/{productId?}','Ccontroller@cart');
Route::post('cart/{action?}/{productId?}','Ccontroller@cart');
Route::get('order','Ccontroller@order');
Route::get('detail/{productId?}','Ccontroller@detail');
Route::post('order','Ccontroller@postOrder');


