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

Route::get('/','r@index');

Route::post('/simpan','r@simpandata');
Route::post('/hapus','r@hapusdata');
Route::post('/simpandataurl','r@simpanurl');
	



