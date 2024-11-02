<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;
use App\Http\Controllers\MyaccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\FrontendTeamMemberController;






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

// Route::get('/home', 'HomeController@index')->name('home');


// custom logins
Route::view('/login', 'customlogin.login_user')->name('login');
Route::post('/login/check', 'AuthController@login')->name('login.check');
Route::view('/register/user', 'customlogin.register_user')->name('user.register');
Route::post('/register/user', 'UsersController@register')->name('register_user.store');



Route::get('/admin/login', function () {
    return view('customlogin.login_admin'); // Replace 'vendor.login' with the view name for vendor login
})->name('admin.login');

Route::post('/login/check', 'AuthController@login')->name('login.check');


Route::post('/login/check/admin', 'AdminController@login')->name('login.check_admin');


Route::get('/register-user', function () {
    return view('customlogin.register_user'); // Adjust view path if necessary
})->name('user.register');

// custom logins ends here



// frontend routes


// Route::view('/home', 'frontend.index')->name('home');

// Route::view('/login/user', 'customlogin.login_user')->name('login');

// Show the login form
Route::get('/login', 'AuthController@loginForm')->name('login');

// Handle login request
Route::post('/login', 'AuthController@login')->name('login.submit');

// Home route
// Route::view('/home', 'frontend.index')->name('home'); 

// Handle logout request
Route::post('/logout', 'AuthController@logout')->name('logout');

// myaccount

// Route::view('/myaccount', 'frontend.my-account')->name('myaccount');
Route::view('/wishlist', 'frontend.wishlist')->name('wishlist');

// myaccount update

// Route to show the account form
Route::get('/myaccount', 'MyaccountController@showAccount')->name('myaccount');

// Route to handle the account update
Route::put('/myaccount/update', 'MyaccountController@updateAccount')->name('myaccount.update');




// backend dashboard
  

Route::view('/dashboard', 'backend.index')->name('admin.dashboard')->middleware('admin'); 


// admin logout
Route::post('/admin/logout','AdminController@logout')->name('admin.logout');

// myprofile
// Route::view('/dashboard/myprofile', 'backend.profilemanage')->name('myprofile')->middleware(['middleware' => ['auth:admin']]);
// routes/web.php or routes/admin.php

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/admin/profile', 'MyprofileController@showProfile')->name('myprofile');
});


Route::group(['middleware' => ['auth:admin']], function () {
    Route::post('/admin/profile/update', 'MyprofileController@updateProfile')->name('admin.updateProfile');
});



// Route::view('/dashboard/abhi', 'backend.common.abhi')->name('test'); 
// Route::view('/dashboard/products', 'products.productdetails')->name('ak'); 

// admin profile update
// Route::post('/admin/profile/update', 'MyprofileController@updateProfile')->name('admin.updateProfile')->middleware('admin');


// Route::get('/admin/site-settings', 'SiteSettingsController@index')->name('site-settings.index');
// Route::post('/admin/site-settings', 'SiteSettingsController@store')->name('settings.store');

// Route to display the form for updating site settings
Route::get('/admin/sitesettings', 'SiteSettingsController@index')->name('sitesettings.index');

// Route to handle form submission and update the site settings
Route::post('/admin/sitesettings/update', 'SiteSettingsController@update')->name('sitesetting.update');





// Route::post('/settings/store', 'SiteSettingController@store')->name('settings.store');



// for products
Route::get('/products','ProductsController@index')->name('products.index')->middleware('admin');
Route::get('/products/create','ProductsController@create')->name('products.create')->middleware('admin');
Route::post('/products/store','ProductsController@store')->name('products.store')->middleware('admin');
Route::delete('/products/{id}', 'ProductsController@delete')->name('products.delete')->middleware('admin');
Route::get('/products/edit/{id}','ProductsController@edit')->name('products.edit')->middleware('admin');
Route::put('/products/update/{id}','ProductsController@update')->name('products.update')->middleware('admin');

Route::get('/products/details{id}', 'ProductsController@show')->name('products.show');


// for users data display in dashboard
Route::get('/users','UsersController@index')->name('users.index')->middleware('admin');
Route::delete('/users/{id}', 'UsersController@delete')->name('users.delete')->middleware('admin');
Route::get('/users{id}', 'UsersController@show')->name('users.show');


// datadisplay in frontend index page

// Route::get('/home', 'ProductsController@front')->name('home'); // Adjust as necessary


Route::get('/home', 'HomePageController@index')->name('home');
Route::get('/home', 'HomePageController@index')->name('home');
Route::get('/shop', 'HomePageController@ProductsIndex')->name('products.shop');



// cart

Route::post('/cart/add', 'CartController@addToCart')->name('cart.add');

Route::get('/cart', 'CartController@viewCart')->name('cart.view')->middleware('auth');

Route::post('/cart/update', 'CartController@update')->name('cart.update');
Route::post('/cart/clear', 'CartController@clear')->name('cart.clear');

Route::post('/checkout', 'CartController@checkout')->name('checkout'); 



// cartdisplay in admin dashboard
Route::get('/carts/items','CartController@indexAdmin')->name('carts.index')->middleware('admin');
Route::delete('/carts/{id}', 'CartController@deleteAdmin')->name('carts.delete')->middleware('admin');
Route::get('/carts{id}', 'CartController@showAdmin')->name('carts.show');



// orders data dispaply in admin dashboard
Route::get('/order/items','OrderController@index')->name('orders.index')->middleware('admin');
Route::delete('/orders/{id}', 'OrderController@delete')->name('orders.delete')->middleware('admin');


// shipping details data dispaply in admin dashboard
Route::get('/shippings/data','ShippingController@indexAdmin')->name('shippings.index')->middleware('admin');
Route::delete('/shippings/data/{id}', 'ShippingController@deleteAdmin')->name('shipping_details.delete')->middleware('admin');



// Remove a specific item from the cart
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');


// to store shipping details 
Route::post('/shipping/store', 'ShippingController@store')->name('shipping.store');


// stripe payments

// Route for initiating Stripe Checkout
Route::get('checkout', 'StripeController@checkout')->name('stripe.checkout');

// Route for successful payment
Route::get('checkout/success', 'StripeController@success')->name('stripe.success');

// Route for canceled payment
Route::get('checkout/cancel', 'StripeController@cancel')->name('stripe.cancel');



// for updating order_status
Route::put('/orders/{orderStatus}/update', 'OrderController@updateStatus')->name('orders.updateStatus');


// feedback 
Route::post('/feedback/store', 'FeedbackController@store')->name('feedback.store');
Route::get('/contact/form', 'FeedbackController@showContactForm')->name('contact.form');

Route::get('/feedback/data','FeedbackController@indexAdmin')->name('feedback.index')->middleware('admin');
Route::delete('/feedback/data/{id}', 'FeedbackController@deleteAdmin')->name('feedback.delete')->middleware('admin');




// for team members
Route::get('/team', 'TeamMemberController@index')->name('team.index')->middleware('admin');
Route::get('/team/create', 'TeamMemberController@create')->name('team.create')->middleware('admin');
Route::post('/team/store', 'TeamMemberController@store')->name('team.store')->middleware('admin');
Route::delete('/team/{id}', 'TeamMemberController@delete')->name('team.delete')->middleware('admin');
Route::get('/team/edit/{id}', 'TeamMemberController@edit')->name('team.edit')->middleware('admin');
Route::put('/team/update/{id}', 'TeamMemberController@update')->name('team.update')->middleware('admin');


Route::get('/about-us', 'FrontendTeamMemberController@index')->name('aboutus'); 
