<?php
Route::prefix('admin')->group(function(){
	Route::get('comment','Acontroller@comment');
	Route::get('/search/{type1?}/{typeId?}/{type2?}/{artistId?}','Acontroller@search');
	Route::get('orderdetail/{orderId?}','Acontroller@orderdetail');
	Route::get('/order','Acontroller@order');
	Route::get('/product','Acontroller@product');
	Route::get('logout','Acontroller@logout');
	Route::post('/','Acontroller@postLoginAdmin');
	Route::get('/','Acontroller@index');

	Route::get('productedit/{productId?}','Acontroller@productEdit');
	Route::post('productedit/{productId?}','Acontroller@postProductEdit');

	Route::get('onoff/{commentId?}','Acontroller@onoff');
	Route::post('orderdetail/{orderId?}','Acontroller@postStatus');
	Route::get('type', function () {
    return view('admin.type');
	});
	Route::post('type','Acontroller@addType');
	Route::post('typeedit/{typeId?}','Acontroller@postType');
	Route::get('typeedit/{typeId?}','Acontroller@typeEdit');


	Route::get('artist', function () {
    return view('admin.artist');
	});
	Route::post('artist','Acontroller@addArtist');
	Route::get('artistedit/{artistId?}','Acontroller@artistEdit');
	Route::post('artistedit/{artistId?}','Acontroller@postArtist');

	Route::get('artist', function () {
    return view('admin.artist');
	});
	Route::get('password', function () {
    return view('admin.password');
	});
	Route::post('password','Acontroller@password');
	Route::get('addProduct', function () {
    return view('admin.product.addproduct');
	});
	Route::post('addProduct','Acontroller@postAddProduct');
});

Route::get('/', function () {
    return view('index');
});
Route::get('login', function () {
    return view('login');
});
Route::get('logout','Ccontroller@logout');
Route::post('login','Ccontroller@postLogin');
Route::post('register','Ccontroller@postRegister');
Route::get('register', function () {
    return view('register');
});
Route::get('home','Ccontroller@home');
Route::get('search/{type1?}/{artistId?}/{type2?}/{typeId?}','Ccontroller@search');
Route::post('search/{type1?}/{artistId?}','Ccontroller@search');
Route::get('cart', function () {
    return view('cart');
});
Route::get('cart/{action?}/{productId?}','Ccontroller@cart');
Route::post('cart/{action?}/{productId?}','Ccontroller@cart');
Route::get('order','Ccontroller@order');
Route::post('updateinfo','Ccontroller@updateinfo');
Route::post('order','Ccontroller@postOrder');
Route::get('detail/productId/{productId?}','Ccontroller@detail');
Route::get('like/productId/{productId}','Ccontroller@like');
Route::get('account/{username?}','Ccontroller@account');
Route::post('comment/productId/{productId?}','Ccontroller@postComment');
Route::get('likedislike/{type?}/{commentId?}','Ccontroller@likedislike');
Route::post('account','Ccontroller@postAccount');
Route::get('change', function () {
    return view('change');
});
Route::post('change','Ccontroller@changePassword');