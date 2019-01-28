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

Route::get('/','HomeController@index')->name('index');
Route::get('about','HomeController@about')->name('about');

Route::get('events','HomeController@events')->name('events');
Route::get('events/{id}','HomeController@showEvent')->name('showEvent');


Route::get('contact','HomeController@contact')->name('contactUs');
Route::post('contact','HomeController@sendMessage')->name('sendContactUs');

Route::get('blog','HomeController@blog')->name('blog');
Route::get('blog/{id}','PostController@show')->name('showBlog');

Route::group([
	'middleware' => ['role:'.\App\User::ROLE_USER, 'auth'],
	'prefix' => 'home',
	'namespace' => 'user'
	], function(){
		
		Route::get('/','HomeController@index')->name('user.dashboard');

		Route::get('events','HomeController@events')->name('user.events');
		Route::get('event/{id}','EventController@show')->name('user.event.show');

		Route::get('financial','HomeController@financial')->name('user.financial');

		Route::get('payment','HomeController@payment')->name('user.payment');
		Route::get('report','HomeController@report')->name('user.report');
		Route::get('{user}/{cash}/zarinpal/verify', 'PaymentGateway@paymentVerify')->name('zarinpalRevertURL');
		Route::post('gateway','PaymentGateway@gateway')->name('user.gateway');
		
		Route::get('profile','HomeController@profile')->name('user.profile');
		Route::post('changePassword','ProfileController@changePassword')->name('user.password');
		Route::post('updateProfile','ProfileController@update')->name('user.update');

	});
Route::group([
	'middleware' => ['role:'.\App\User::ROLE_ADMIN, 'auth'],
	'prefix' => 'dashboard',
	'namespace' => 'admin'
	], function(){
		
		Route::get('/','HomeController@index')->name('admin.dashboard');

		Route::get('events','EventController@index')->name('admin.events');
		Route::get('events/create','EventController@create')->name('admin.events.create');
		Route::post('events','EventController@store')->name('admin.events.store');
		Route::get('events/{id}','EventController@show')->name('admin.events.show');
		Route::get('event/{id}/delete','EventController@delete')->name('admin.events.delete');
		Route::PATCH('event/{id}/update','EventController@update')->name('admin.events.update');
		Route::get('event/{id}/users','EventController@users')->name('admin.events.users');

		Route::get('news','NewsController@index')->name('admin.news');
		Route::get('news/create','NewsController@create')->name('admin.news.create');
		Route::post('news','NewsController@store')->name('admin.news.store');
		Route::get('news/{id}/delete','NewsController@delete')->name('admin.news.delete');
		Route::patch('news/{id}/update','NewsController@update')->name('admin.news.update');
		Route::get('news/{id}','NewsController@show')->name('admin.news.show');

		Route::get('sendMessages','MessageController@sendMessages')->name('admin.sendMessages');
		Route::get('receiveMessages','MessageController@receiveMessages')->name('admin.receiveMessages');
		Route::post('messages','MessageController@send')->name('admin.message.send');
		Route::get('messages/create','MessageController@create')->name('admin.messages.create');
		Route::delete('messages/{id}/delete','MessageController@delete')->name('admin.message.delete');
		Route::get('messages/{id}','MessageController@show')->name('admin.messages.show');

		Route::get('users','UserController@index')->name('admin.users');
		Route::get('admins','UserController@admins')->name('admin.admins');
		// Route::get('user/create','UserController@create')->name('admin.users.create');
		// Route::post('user','UserController@store')->name('admin.users.store');
		Route::get('users/{id}','UserController@show')->name('admin.users.show');
		Route::get('user/{id}/upgrade','UserController@upgrade')->name('admin.users.upgrade');
		Route::get('user/{id}/downgrade','UserController@downgrade')->name('admin.users.downgrade');
		Route::get('user/{id}/delete','UserController@delete')->name('admin.users.delete');
		// Route::patch('user/{id}/update','UserController@update')->name('admin.users.update');

		Route::get('setting','SiteController@index')->name('admin.setting');
		Route::patch('setting/update','SiteController@update')->name('admin.setting.update');

		Route::get('financial','FinancialController@index')->name('admin.financial');
		// Route::get('notifications');
		// Route::get('calendar')
		Route::get('profile','HomeController@profile')->name('admin.profile');
		Route::post('changePassword','ProfileController@changePassword')->name('admin.password');
		Route::post('updateProfile','ProfileController@update')->name('admin.profile.update');
	});
Auth::routes();
