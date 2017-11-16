<?php 

Route::group(array('namespace' => 'Dealaxer\GammuE2S\Controllers','middleware' => ['web','auth']), function() {

	Route::get('/home', 'HomeController@index'); //Start Page - Gag Home
	Route::get('/dashboard', 'DashboardController@index');
	Route::post('/compose-sms', ['as' => 'compose-sms', 'uses' => 'DashboardController@create']);
	
	Route::get('/inbox', 'InboxController@index');
	Route::get('/inbox/delete/{id}', 'InboxController@remove');
	Route::get('/inboxDeleteAll', 'InboxController@deleteAll');
	
	Route::get('/outbox', 'OutboxController@index');
	Route::get('/outbox/delete/{id}', 'OutboxController@remove');
	Route::get('/outboxDeleteAll', 'OutboxController@deleteAll');
	
	Route::get('/sentitems', 'SentItemsController@index');
	Route::get('/sentitems/delete/{id}', 'SentItemsController@remove');
	Route::get('/sentitemsDeleteAll', 'SentItemsController@deleteAll');
	
	Route::get('/phones', 'PhonesController@index');
	
	Route::get('/logs', function() {
		return view('gammu-e2s::logs');
	});
	Route::post('/logs/delete', ['as' => 'destroylogs', 'uses' => 'SMSDSettingsController@destroylogs']);
	
	Route::get('/smsd-settings', 'SMSDSettingsController@index');
	Route::post('/smsd-settings/update', ['as' => 'changesettings', 'uses' => 'SMSDSettingsController@update']);
	
	Route::get('/email2sms', 'EmailToSMSController@index');
	Route::post('/email2sms/enable', ['as' => 'enablesms', 'uses' => 'EmailToSMSController@enable']);
	Route::post('/email2sms/save', ['as' => 'savesms', 'uses' => 'EmailToSMSController@save']);
	Route::post('/email2sms/enableoneemail', ['as' => 'enableoneemail', 'uses' => 'EmailToSMSController@enableoneemail']);
	Route::post('/email2sms/saveoneemail', ['as' => 'saveoneemail', 'uses' => 'EmailToSMSController@saveoneemail']);
	
	//Route::get('/cron', 'EmailToSMSController@cron'); //future feature
	
	Route::get('/users', 'UsersController@index');
	Route::get('/users/edit/{id}', 'UsersController@edit');
	Route::post('/users/update/{id}', 'UsersController@update');
	
	Route::get('/phpinfo', function() {
		return view('gammu-e2s::phpinfo');
	});

});

Route::get('/email2sms/execute', 'Dealaxer\GammuE2S\Controllers\EmailToSMSController@execute'); //cron

Route::group(array('namespace' => 'App\Http\Controllers','middleware' => ['web']), function() {
// Login Routes...
	Route::get('/', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
	Route::post('/', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
	Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

});
