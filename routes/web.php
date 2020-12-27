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

//App Routes
Route::get('/', 'HomeController@index')->middleware('guest')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    /* Check if account selected for session or not */
    Route::middleware(['account.first'])->group(function () {
        Route::GET('/accounts', 'AccountController@index')->name('account.index');
        Route::GET('/account/delete', 'AccountController@delete')->name('account.delete');

        Route::GET('/dashboard', 'HomeController@dashboard')->name('app.dashboard');

        Route::middleware(['account.match'])->group(function () {
            // Company
            Route::GET('/p/{account?}/company', 'CompanyController@index')->name('company.index');
            Route::POST('/p/{account?}/company/create', 'CompanyController@create')->name('company.create');
            Route::GET('/p/{account?}/company/delete', 'CompanyController@delete')->name('company.delete');

            // Contact
            Route::GET('/p/{account?}/contacts', 'ContactController@index')->name('contact.index');
            Route::POST('/p/{account?}/contact/create', 'ContactController@create')->name('contact.create');
            Route::GET('/p/{account?}/contact/{contact}/edit', 'ContactController@edit')->name('contact.edit');
            Route::POST('/p/{account?}/contact/{contact}/submit', 'ContactController@create')->name('contact.submit');
            Route::get('/p/{account?}/contact/delete', 'ContactController@delete')->name('contact.delete');
        });

        // User
        Route::GET('/user/profile', 'UserController@showProfileForm')->name('user.profile.index');
        Route::POST('/user/profile/edit', 'UserController@editProfile')->name('user.profile.edit');
        Route::GET('/user/password', 'UserController@showPasswordForm')->name('user.password.index');
        Route::POST('/user/password/edit', 'UserController@editPassword')->name('user.password.edit');
    });

    Route::GET('/account/create', 'AccountController@showCreateForm')->middleware('account.oneonly')->name('account.create');
    Route::POST('/account/submit', 'AccountController@submit')->middleware('account.oneonly')->name('account.submit');
});

//test Routes
Route::GET('/test', 'TestController@test');
