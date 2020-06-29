<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{id}', 'UserController@show');

Route::get('me', 'UserController@edit');

Route::get('home', function () {
    return redirect('mypage');
});

Route::get('mypage','MypageController@show');

Route::get('opinionaire_create','OpinionaireController@show');

Route::post('opinionaire_comfirm','OpinionaireController@comfirm');

Route::get('opinionaire_create','OpinionaireController@show');


