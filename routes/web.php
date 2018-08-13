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
$role = "editor";

Auth::routes();

Route::middleware('auth')->group(
    function () {
        Route::get('/', 'HomeController@index')->name('home')->middleware('check.roles: super_admin');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/dashboard', 'HomeController@index')->name('home')->middleware('check.role:super_admin,user');
        Route::get('/charts', 'ChartsController@index')->name('charts');
        Route::get('/tables', 'TablesController@index')->name('tables');
        Route::get('/components/navbar', 'NavbarController@index')
            ->name('components_navbar');
        Route::get('/components/cards', 'CardsController@index')
            ->name('components_cards');
    }
);
Route::post(
    '/logout',
    function () {
        Auth::logout();

        return redirect('/home');
    }
)->name('logout');
