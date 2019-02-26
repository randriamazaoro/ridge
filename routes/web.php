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
			Route::get('/store', 'Admin\UpgradeController@store');
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
		Route::post('/add/faq', 'Superadmin\FinanceController@storeFaq');
		Route::post('/modify/faq', 'Superadmin\ProgramController@updateFaq');
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

});

Route::prefix('paypal')->group(function (){
	Route::get('express-checkout', 'PaypalController@expressCheckout')->name('paypal.express-checkout');
	Route::get('express-checkout-success', 'PaypalController@expressCheckoutSuccess');
	Route::post('notify', 'PaypalController@notify');

});


Route::get('/logout', function(){
	Auth::logout();
	return redirect('');
})->name('logout');

Route::fallback(function(){
	return view('errors.404');
});

Route::prefix('mailable/user/')->group(function (){
	Route::get('has-completed-initiation', function () {
		return new App\Mail\UserHasCompletedInitiation();
	});
	Route::get('has-completed-registration', function () {
		return new App\Mail\UserHasCompletedRegistration('https://localhost:8000');
	});
	Route::get('has-received-transfer', function () {
		$user = App\User::find(2);
		$transfer_request = App\TransferRequest::find(2);
		return new App\Mail\UserHasReceivedTransfer($transfer_request, $user);
	});
	Route::get('has-requested-transfer', function () {
		$user = App\User::find(2);
		$transfer_request = App\TransferRequest::find(2);
		return new App\Mail\UserHasRequestedTransfer($transfer_request, $user);
	});

	Route::get('has-requested-ebook', function () {
		return new App\Mail\UserHasRequestedEbook;
	});

	Route::get('has-sale', function () {
		$sale = App\Sale::find(1);
		$affiliate = App\Affiliate::find(1);
		$user = App\User::find(2);

		return new App\Mail\UserHasSale($sale, $affiliate, $user);
	});

	Route::get('has-forgotten-password', function () {
		return new App\Mail\UserHasForgottenPassword('http://localhost:8000');
	});

});

Route::prefix('mailable/superadmin/')->group(function (){

	Route::get('has-transfer-request', function () {
		$transfer_request = App\TransferRequest::find(2);
		return new App\Mail\SuperAdminHasTransferRequest($transfer_request);
	});

	Route::post('has-new-message', function () {
		return new App\Mail\SuperAdminHasNewMessage($request);
	});

	Route::get('has-sale', function () {
		$sale = App\Sale::find(1);
		$affiliate = App\Affiliate::find(1);
		$referral = App\Affiliate::find(2);
		$user = App\User::find(2);

		return new App\Mail\SuperAdminHasSale($sale, $affiliate, $referral, $user);
	});

});