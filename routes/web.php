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

    /* Check if company selected for session or not */
    Route::middleware(['account.first'])->group(function () {

        Route::get('/accounts', 'AccountController@index')->name('account.index');
        Route::get('/account/delete', 'AccountController@delete')->name('account.delete');

        Route::get('/dashboard', 'HomeController@dashboard')->name('app.dashboard');

        Route::middleware(['account.match'])->group(function () {
            /* Company */
            Route::get('/p/{account?}/company', 'CompanyController@index')->name('company.index');
            Route::post('/p/{account?}/company/create', 'CompanyController@create')->name('company.create');
            Route::get('/p/{account?}/company/delete', 'CompanyController@delete')->name('company.delete');

            /* Contact */
            Route::get('/p/{account?}/contacts', 'ContactController@index')->name('contact.index');
            Route::post('/p/{account?}/contact/create', 'ContactController@create')->name('contact.create');
            Route::get('/p/{account?}/contact/delete', 'ContactController@delete')->name('contact.delete');
        });
    });

    Route::get('/account/create', 'AccountController@showCreateForm')->middleware('account.oneonly')->name('account.create');
    Route::post('/account/submit', 'AccountController@submit')->middleware('account.oneonly')->name('account.submit');
});


//test Routes
Route::get('/test', 'TestController@test');
