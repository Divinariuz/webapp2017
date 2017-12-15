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

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'shop.index'
]);

Route::get('/add-to-cart/{id}', [
   'uses' => 'ProductController@getAddToCart',
    'as' => 'shop.addToCart'
]);

Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'shop.reduceByOne'
]);

Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'shop.remove'
]);

Route::get('/cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'shop.cart'
]);

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
]);

Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout'
]);

Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'user.signup'
        ]);
        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'user.signup'
        ]);
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });
    Route::group(['middleware' => 'auth'], function(){
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'user.logout'
        ]);

        Route::group(['middleware' => 'admin'], function(){
            Route::get('/admin/users', [
                'uses' => 'AdminController@getUsers',
                'as' => 'admin.users'
            ]);

            Route::post('/admin/users/delete', [
                'uses' => 'AdminController@deleteUser',
                'as' => 'admin.deleteUser'
            ]);

            Route::get('/admin/users/{id}', [
                'uses' => 'AdminController@editUser',
                'as' => 'admin.editUser'
            ]);

            Route::post('/admin/users/{id}', [
                'uses' => 'AdminController@updateUser',
                'as' => 'admin.updateUser'
            ]);

            Route::get('/admin/products', [
                'uses' => 'AdminController@getProducts',
                'as' => 'admin.products'
            ]);

            Route::get('/admin/products/create', [
                'uses' => 'AdminController@getCreateProduct',
                'as' => 'admin.getCreateProduct'
            ]);

            Route::post('/admin/products/create', [
                'uses' => 'AdminController@postCreateProduct',
                'as' => 'admin.postCreateProduct'
            ]);

            Route::post('/admin/products/delete', [
                'uses' => 'AdminController@deleteProduct',
                'as' => 'admin.deleteProduct'
            ]);

            Route::get('/admin/products/{product_id}', [
                'uses' => 'AdminController@editProduct',
                'as' => 'admin.editProduct'
            ]);

            Route::post('/admin/products/{product_id}', [
                'uses' => 'AdminController@updateProduct',
                'as' => 'admin.updateProduct'
            ]);

        });
    });
});