<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

Route::post('opinionaire_answer','OpinionaireController@answer');

Route::middleware('auth')->group(function () {
    
    Route::get('mypage','MypageController@show');

    Route::get('opinionaire_create','OpinionaireController@show');

    Route::post('opinionaire_confirm','OpinionaireController@comfirm');

    Route::post('opinionaire_create','OpinionaireController@show');

    Route::post('opinionaire_save','OpinionaireController@save');

});

//Route::get('opinionaire_{{$opinionaire->user_id}}_{{$opinionaire->title}}','');

Route::get('answer/{id}','AnswerController@answer');

Route::post('answer/{id}/comfirm','AnswerController@comfirm');









