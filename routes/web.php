<?php
use Illuminate\Http\Request;
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

Route::get('/', 'IndexController@index')->name('Index');

Route::resource('/yachts', 'YachtController')->only('index');
Route::get('/yacht/{yacht}/{date}','YachtController@show')->name('YachtItem');
Route::get('/yacht/{yacht}', 'YachtController@showWithoutPeriod')->name('YachtItemWithoutPeriod');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
