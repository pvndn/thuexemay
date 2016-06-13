<?php


Route::group([ 'prefix' => 'admin' ], function () {
	Route::group([ 'middleware' => ['auth:web_users', 'XSS'] ], function () {
		Route::get('/', [ 'as' => 'admin.dashboard', 'uses' => 'Admin\AdminsController@dashboard' ]);

		Route::resource('/category', 'Admin\CategoriesController');
		Route::post('/category/publish', [ 'as' => 'admin.category.publish', 'uses' => 'Admin\CategoriesController@publish' ]);
 
		Route::resource('/page', 'Admin\PagesController');
		Route::post('/page/publish', [ 'as' => 'admin.page.publish', 'uses' => 'Admin\PagesController@publish' ]);
 
		Route::resource('/slider', 'Admin\SliderController');
		Route::post('/slider/publish', [ 'as' => 'admin.slider.publish', 'uses' => 'Admin\SliderController@publish' ]);

		Route::resource('/news', 'Admin\NewsController');
		Route::post('/news/publish', [ 'as' => 'admin.news.publish', 'uses' => 'Admin\NewsController@publish' ]);

		Route::resource('/carriage', 'Admin\CarriagesController');
		Route::post('/carriage/publish', [ 'as' => 'admin.carriage.publish', 'uses' => 'Admin\CarriagesController@publish' ]);
		Route::delete('/album/{album?}', [ 'as' => 'admin.carriage.album', 'uses' => 'Admin\CarriagesController@album' ]);

		Route::resource('/menu', 'Admin\MenusController');
		Route::post('/menu/publish', [ 'as' => 'admin.menu.publish', 'uses' => 'Admin\MenusController@publish' ]);
		Route::get('/menu/add/{menuID}', [ 'as' => 'admin.menu.add', 'uses' => 'Admin\MenusController@getAddItem' ]);
		Route::post('/menu/add', [ 'as' => 'admin.menu.postadd', 'uses' => 'Admin\MenusController@postAddItem' ]);
		Route::post('/menu/update', [ 'as' => 'admin.menu.postupdate', 'uses' => 'Admin\MenusController@postUpdate' ]);

		Route::resource('/gallery', 'Admin\GalleriesController');

		Route::get('/settings', ['as' => 'admin.settings.show', 'uses' => 'Admin\SettingController@index']);
		Route::post('/settings', ['as' => 'admin.settings.create', 'uses' => 'Admin\SettingController@create']);
		Route::put('/settings/{id}', ['as' => 'admin.settings.update', 'uses' => 'Admin\SettingController@update']);

		Route::get('/orders', [ 'as' => 'admin.orders.index', 'uses' => 'Admin\OrderController@index' ]);
		Route::get('/orders/{id}', [ 'as' => 'admin.orders.show', 'uses' => 'Admin\OrderController@show' ]);
		Route::PUT('/orders', [ 'as' => 'admin.orders.update', 'uses' => 'Admin\OrderController@update' ]);

		Route::get('/logout', [ 'as' => 'admin.logout', 'uses' => 'Users\AuthController@logout' ]);

		
		Route::get('/register', [ 'as' => 'admin.register', 'uses' => 'Admin\AdminsController@getRegister' ]);
		Route::post('/register', [ 'as' => 'admin.doregister', 'uses' => 'Admin\AdminsController@register' ]);

	});

	Route::group([ 'middleware' => ['XSS'] ], function () {
		Route::get('/login', [ 'as' => 'admin.login', 'uses' => 'Users\AuthController@index' ]);
		Route::post('/login', [ 'as' => 'admin.dologin', 'uses' => 'Users\AuthController@login' ]);

		Route::get('/password/reset/{token?}', [ 'as' => 'admin.forgot', 'uses' => 'Users\PasswordController@showResetForm' ]);
		Route::post('/password/email', [ 'as' => 'admin.sendmail', 'uses' => 'Users\PasswordController@sendResetLinkEmail' ]);
		Route::post('/password/reset', [ 'as' => 'admin.doforgot', 'uses' => 'Users\PasswordController@reset' ]);
	});
});



Route::get('/', [ 'as' => 'client.site', 'uses' => 'HomeController@index' ]);
Route::get('sitemap.xml', 'SitemapController@generate');
Route::get('feed', 'FeedController@generate');
Route::get('/{slug}', [ 'as' => 'client.slug', 'uses' => 'HomeController@category' ]);
Route::get('order/{id?}', [ 'as' => 'get.order', 'uses' => 'OrderController@orderPage' ]);
Route::get('/{category}/{post}', [ 'as' => 'client.posts', 'uses' => 'HomeController@single' ]);
Route::group([ 'middleware' => ['XSS'] ], function () { 
	Route::post('order/store', [ 'as' => 'post.order', 'uses' => 'OrderController@order' ]);
});

