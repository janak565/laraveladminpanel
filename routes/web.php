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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
	// Category/Listing Page
		Route::get('/products/{url}','ProductsController@products');
		Route::get('/product/{id}','ProductsController@product');
		Route::match(['get', 'post'], '/add-cart', 'ProductsController@addtocart');
		Route::match(['get', 'post'],'/cart','ProductsController@cart')->name('cart');
		Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');
		Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');


});	

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.'], function () {

	Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {


	Route::group(['middleware' => 'guest:admin'], function () {
		        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login');

        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
            Route::post('register', 'RegisterController@register')->name('register');

         
	});

 Route::post('logout', 'LoginController@logout')->name('logout');

	});
	
	Route::group(['middleware' => 'auth:admin'], function () {
		        Route::get('home', 'HomeController@index')->name('home');
			Route::get('dashboard','AdminController@dashboard')->name('dashboard');
			Route::get('settings','AdminController@settings')->name('settings');
			Route::get('check-pwd','AdminController@chkPassword')->name('chkpassword');

			Route::match(['get','post'],'add-category','CategoriesController@addCategory')->name('addcategory');
		Route::match(['get','post'],'edit-category/{id}','CategoriesController@editCategory')->name('editcategory');
		Route::get('categories','CategoriesController@viewCategory')->name('viewcategory');
		Route::get('delete-category/{id}','CategoriesController@deleteCategory')->name('deletecategory');

		Route::match(['get','post'],'add-product','ProductsController@addProduct')->name('addproduct');
		Route::match(['get','post'],'edit-product/{id}','ProductsController@editProduct')->name('editproduct');
		Route::get('delete-product/{id}','ProductsController@deleteProduct')->name('deleteproduct');
		Route::get('view-products','ProductsController@viewProducts')->name('deleteproduct');
		Route::get('delete-product-image/{id}','ProductsController@deleteProductImage');

		Route::match(['get', 'post'],'update-pwd','AdminController@updatePassword')->name('updatepassword');
 	});

});
