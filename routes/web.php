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

Auth::routes(['verify' => true]);

Route::view('/', 'home')->name('home');
Route::view('/docs', 'faqs.index');

Route::post('/newsletter/add','NewsletterController@store');
Route::get('/newsletter/download/ebook/{id}','NewsletterController@download');

Route::get('email/verification', 'Auth\VerificationController@storeEmail');

//BLOG ROUTES
Route::prefix('blog')->group(function (){
	Route::get('/', 'BlogController@showBlog');
	Route::get('post/{slug}', 'BlogController@showBlogPost');
	Route::post('post/{slug}/comment','BlogController@storeBlogPostComment');
	Route::get('category/{title}','BlogController@showBlogCategories');
});

//Contact ROUTES

Route::get('contact', 'ContactController@index');
Route::post('contact', 'ContactController@store');

//LEGAL ROUTES

Route::prefix('legal')->group(function (){
	Route::view('/mention-légales', 'legal.mentions');
	Route::view('/CGV', 'legal.conditions');
	Route::view('/credit', 'legal.credit');
});

//ESPACE ROUTE
Route::prefix('admin')->group(function (){
	Route::get('/', 'AdminController@index');

	Route::prefix('settings')->group(function (){
		// Settings routes
		Route::get('/', 'Admin\SettingsController@index');
		Route::post('/{q}', 'Admin\SettingsController@update');

		Route::prefix('upgrade')->group(function (){
			// Specific upgrade setting routes
			Route::get('/', 'Admin\UpgradeController@index');
			Route::post('/summary', 'Admin\UpgradeController@show');
			Route::get('/store','Admin\UpgradeController@store');
		});
	});
	
	Route::prefix('initiation')->group(function (){
		// Initiation routes
		Route::get('/','Admin\InitiationController@index');
		Route::post('/summary','Admin\InitiationController@show');
		Route::get('/store','Admin\InitiationController@store');
	});


	// Transfer Request route
	Route::prefix('transfer-request')->group(function (){
		Route::get('/','Admin\TransferRequestController@store');
		Route::get('/delete','Admin\TransferRequestController@destroy');
	});

});

Route::prefix('superadmin')->group(function (){
	Route::get('', 'SuperAdminController@index');

	Route::prefix('users')->group(function (){
		Route::get('/', 'Superadmin\UserController@index');
		Route::get('/{id}', 'Superadmin\UserController@show');
	});

	Route::prefix('finances')->group(function (){
		Route::get('/', 'Superadmin\FinanceController@index');
		Route::get('/transfer-request/{id}','Superadmin\TransferRequestController@show');
		Route::get('/transfer-request/{id}/store','Superadmin\TransferRequestController@update');
	});

	Route::prefix('programs')->group(function (){
		Route::get('/', 'Superadmin\ProgramController@index');
		Route::post('/add/theme', 'Superadmin\ProgramController@storeTheme');
		Route::post('/modify/theme', 'Superadmin\ProgramController@updateTheme');
		Route::get('/delete/theme/{id}', 'Superadmin\ProgramController@destroyTheme');
		Route::post('/add/faq', 'Superadmin\FinanceController@storeFaq');
		Route::post('/modify/faq', 'Superadmin\ProgramController@updateFaq');
		Route::get('/delete/faq/{id}', 'Superadmin\ProgramController@destroyFaq');
	});

	Route::prefix('blog')->group(function (){
		Route::get('/','Superadmin\BlogController@index');
		Route::post('/add/post', 'Superadmin\BlogController@storePost');
		Route::post('/modify/post', 'Superadmin\BlogController@updatePost');
		Route::get('/delete/post/{id}','Superadmin\BlogController@destroyPost');
		Route::post('/add/category', 'Superadmin\BlogController@storeCategory');
		Route::post('/modify/category', 'Superadmin\BlogController@updateCategory');
		Route::get('/delete/category/{id}','Superadmin\BlogController@destroyCategory');
	});

	Route::prefix('settings')->group(function (){
		Route::get('/','Superadmin\SettingsController@index');
		Route::post('/{q}', 'Superadmin\SettingsController@update');
	});

});

Route::get('/superadmin/{masterkey}','Auth\MasterkeyController@login');

Route::prefix('paypal')->group(function (){
	Route::get('express-checkout', 'PaypalController@expressCheckout');
	Route::get('express-checkout-success', 'PaypalController@expressCheckoutSuccess');

});


Route::get('/logout', function(){
	Auth::logout();
	return redirect('');
})->name('logout');

Route::fallback(function(){
	return view('errors.404');
});