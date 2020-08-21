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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}', 'UserController@show');

Route::get('me', 'UserController@edit');

Route::get('home', function () {
    return redirect('mypage');
});

Route::post('opinionaire_answer','OpinionaireController@answer');

Route::middleware('auth')->group(function () {
    
    Route::get('mypage','MypageController@show')->name("mypage");

    Route::post('mypage','MypageController@show')->name("mypage_p");

    Route::get('opinionaire_create','OpinionaireController@show');

    Route::post('opinionaire_confirm','OpinionaireController@comfirm');

    Route::post('opinionaire_create','OpinionaireController@show');

    Route::post('opinionaire_save','OpinionaireController@save');

    Route::get('my/opinionaire','AnswerListController@list')->name("my_opinionaire");

    Route::get('my/{opinionaire}/edit','OpinionaireController@edit')->name("my_opinionaire_edit");

    Route::post('my/{opinionaire}/edit','OpinionaireController@edit_save')->name("my_opinionaire_edit_save");
    
    Route::get('my/{opinionaire}/delete','AnswerListController@delete')->name("my_opinionaire_delete");
    
    Route::get('my/{opinionaire}/answer','AnswerController@answer')->name("my_opinionaire_answer");

    Route::get('myopinionaire/{opinionaire}/result','AnswerListController@result')->name("my_opinionaire_result");

});

//Route::get('opinionaire_{{$opinionaire->user_id}}_{{$opinionaire->title}}','');

Route::get('answer/{opinionaire}','AnswerController@answer')->name("answer");

Route::post('answer/{opinionaire}/comfirm','AnswerController@comfirm')->name("answer_comfirm");

Route::post('answer/{opinionaire}/save','AnswerController@save')->name("answer_save");











