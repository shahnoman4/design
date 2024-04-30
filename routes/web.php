<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('getQuote', function () {
//     return view('front.getQuote');
// });

Route::get('getQuote', 'Front\FrontController@getQuote')->name('getQuote');
Route::get('instantQuote', 'Front\FrontController@instantQuote')->name('instantQuote');




Auth::routes();
//Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);


    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');


    // estimate
Route::get('/estimate', 'Backend\TransactionController@index')->name('admin.transaction.estimate');
Route::post('/add/payment/method', 'Backend\TransactionController@paymentMethod')->name('add.payment.method');
Route::get('/get/payment/method', 'Backend\TransactionController@getPaymentMethod')->name('get.payment.method');

// customer
Route::post('/customer/create', 'Backend\CustomerController@create')->name('customer.create');
Route::get('/get/customer', 'Backend\CustomerController@getCustomer')->name('get.customer');
Route::get('/get/customerById', 'Backend\CustomerController@customerById')->name('get.customerById');

// tag and group
Route::post('/tag/create', 'Backend\TransactionController@tag')->name('tag.create');
Route::post('/group/create', 'Backend\TransactionController@group')->name('group.create');
Route::get('/get/group', 'Backend\TransactionController@getGroup')->name('get.group');
Route::get('/fetch/group', 'Backend\TransactionController@fetchGroup')->name('fetch.group');
Route::post('/edit/group', 'Backend\TransactionController@editGroup')->name('edit.group');
Route::get('/fetch/tag', 'Backend\TransactionController@fetchTag')->name('fetch.tag');
Route::post('/edit/tag', 'Backend\TransactionController@editTag')->name('edit.tag');
Route::get('/get/tag', 'Backend\TransactionController@getTag')->name('get.tag');

// services
Route::post('/service/create', 'Backend\ServiceController@create')->name('service.create');
Route::get('/get/service', 'Backend\ServiceController@getservice')->name('get.service');
Route::get('/get/serviceById', 'Backend\ServiceController@serviceById')->name('get.serviceById');

// customer
Route::get('/customer', 'Backend\ManageCustomerController@index')->name('admin.customer.index');
Route::get('/customer/fetch', 'Backend\ManageCustomerController@fetch')->name('admin.customer.fetch');
Route::post('/customer/store', 'Backend\ManageCustomerController@store')->name('admin.customer.store');
Route::post('/customer/edit', 'Backend\ManageCustomerController@edit')->name('admin.customer.edit');
Route::post('/customer/delete', 'Backend\ManageCustomerController@delete')->name('admin.customer.delete');

// supplier
Route::get('/supplier', 'Backend\SupplierController@index')->name('admin.supplier.index');
Route::get('/supplier/fetch', 'Backend\SupplierController@fetch')->name('admin.supplier.fetch');
Route::post('/supplier/store', 'Backend\SupplierController@store')->name('admin.supplier.store');
Route::post('/supplier/edit', 'Backend\SupplierController@edit')->name('admin.supplier.edit');
Route::post('/supplier/delete', 'Backend\SupplierController@delete')->name('admin.supplier.delete');

// account
Route::get('/account', 'Backend\AccountController@index')->name('admin.account.index');
Route::get('/account/fetch', 'Backend\AccountController@fetch')->name('admin.account.fetch');
Route::post('/account/store', 'Backend\AccountController@store')->name('admin.account.store');
Route::post('/account/edit', 'Backend\AccountController@edit')->name('admin.account.edit');
Route::post('/account/delete', 'Backend\AccountController@delete')->name('admin.account.delete');


});
