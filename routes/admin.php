<?php
//后台路由
Route::group(['prefix'=>'admin'],function(){
	Route::get('/','Admin\LoginController@index')->name('admin.login');

	Route::get('login', 'Admin\LoginController@index');
	Route::post('login', 'Admin\LoginController@login');
	Route::post('logout', 'Admin\LoginController@logout');

    // Route::group(['middleware' => ['web','throttle:1,1']], function ()
    // {
    //     Route::post('login', 'Admin\LoginController@login');
    // });


	//验证的路由
	Route::group(['middleware' => 'auth:admin'], function(){
		// Route::get('home', 'Admin\LoginController@index');
		Route::get('dash', 'Admin\DashboardController@index');





	});

            // 管理员管理
            Route::get('/admins', 'Admin\AdminController@index');
            Route::get('/admins/create', 'Admin\AdminController@create');
            Route::post('/admins/store', 'Admin\AdminController@store');
            Route::post('/admins/del', 'Admin\AdminController@ajaxDestroy');
            Route::get('/admins/{admin}/role', 'Admin\AdminController@role');
            Route::post('/admins/{admin}/role', 'AdminAdminController@storeRole');



});


