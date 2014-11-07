<?php

Route::get('/', 'FrontEndController@getIndex');

/** SMS untuk send sama receive **/
Route::get('sms/send/{txt}','SMSController@send');
Route::get('sms/recv/','SMSController@recv');
Route::get('sms/recvdebug/','SMSController@recvdebug')


Route::get('createuser', function() {
	User::create([
		'username' => 'admin',
		'password' => Hash::make('admin1234'),
		'role' => 'admin',
	]);
	User::create([
		'username' => 'user',
		'password' => Hash::make('user1234'),
		'role' => 'user',
	]);
	return 'OK!';
});

Route::get('login', 'SessionController@create');
Route::get('logout', 'SessionController@destroy');


Route::resource('sessions', 'SessionController');

Route::group(['before' => 'auth'], function() {

	Route::get('admin', function ()
	{
		return View::make('hello');	
	});



	// Route::get('stock_materials/destroy/{id}', 'StockMaterialController@destroy');
	// Route::resource('stock_materials', 'StockMaterialController');
});


Route::group(['before' => 'admin'], function() {
	Route::get('admin/disasters/destroy/{id}', 'DisasterController@destroy');
	Route::resource('admin/disasters', 'DisasterController');

	Route::get('admin/disaster_categories/destroy/{id}', 'DisasterCategoryController@destroy');
	Route::resource('admin/disaster_categories', 'DisasterCategoryController');

	Route::get('admin/reports/destroy/{id}', 'ReportController@destroy');
	Route::resource('admin/reports', 'ReportController');

	Route::get('admin/requests/destroy/{id}', 'RequestController@destroy');
	Route::resource('admin/requests', 'RequestController');

	Route::get('admin/responses/destroy/{id}', 'ResponseController@destroy');
	Route::resource('admin/responses', 'ResponseController');

	Route::get('admin/users/destroy/{id}', 'UserController@destroy');
	Route::resource('admin/users', 'UserController');

});

HTML::macro('nav_link', function($route, $text) {
	$link = explode('/', Request::path());
	if ($link[0] == $route)
		$active = "class = 'active'";
	else
		$active = '';

  	return '<li '.$active.'><a href="'.url($route).'" ><i class="fa fa-angle-double-right"></i>'.$text.'</a></li>';
});

