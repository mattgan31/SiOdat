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



Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    //Penjualan
    Route::get('penjualan', 'IncomeController@index')->name('penjualan');
    Route::get('input-penjualan', 'IncomeController@create')->name('input-penjualan');
    Route::post('penjualan', 'IncomeController@store');
    Route::get('penjualan/edit/{income}', 'IncomeController@edit');
    Route::put('penjualan/edit/{income}', 'IncomeController@update');
    Route::delete('penjualan/delete/{income}', 'IncomeController@destroy');
    Route::post('penjualan/filter', 'IncomeController@filter')->name('penjualan.filter');
    //Pengeluaran
    Route::get('pengeluaran', 'OutcomeController@index')->name('pengeluaran');
    Route::get('input-pengeluaran', 'OutcomeController@create')->name('input-pengeluaran');
    Route::post('pengeluaran', 'OutcomeController@store');
    Route::get('pengeluaran/edit/{outcome}', 'OutcomeController@edit')->name('edit-pengeluaran');
    Route::put('pengeluaran/edit/{outcome}', 'OutcomeController@update');
    Route::delete('pengeluaran/delete/{outcome}', 'OutcomeController@destroy');
    Route::post('pengeluaran/filter', 'OutcomeController@filter')->name('pengeluaran.filter');
    //Keuntungan
    Route::get('keuntungan', 'ProfitController@index');
    Route::post('keuntungan/filter', 'ProfitController@filter')->name('profit.filter');
    Route::get('logout', 'AuthController@logout')->name('logout');
});
