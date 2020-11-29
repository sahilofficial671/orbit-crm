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
//test Routes
Route::get('/test', 'TestController@test');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});

Route::middleware(['auth', 'verified'])->group(function () {

    /* Check if company selected for session or not */
    Route::middleware(['account.selected'])->group(function () {
        Route::get('/dashboard', function(){ return view('dashboard'); })->name('dashboard');

        /* Account */
        Route::get('/account/{account?}/dashboard', 'AccountController@dashboard')->name('account.dashboard');

        /* Company */
        Route::get('/company', 'CompanyController@index')->name('company.index');
        Route::post('/company/create', 'CompanyController@create')->name('company.create');
        Route::get('/company/delete', 'CompanyController@delete')->name('company.delete');

        /* Contact */
        Route::get('/contacts', 'ContactController@index')->name('contact.index');
        Route::post('/contact/create', 'ContactController@create')->name('contact.create');
        Route::get('/contact/delete', 'ContactController@delete')->name('contact.delete');
    });

        Route::get('/accounts', 'AccountController@index')->name('account.index');
        Route::get('/account/select', 'AccountController@select')->name('account.select');
        Route::get('/account/delete', 'AccountController@delete')->name('account.delete');
});
