<?php


use Illuminate\Support\Facades\Route;
use App\Models\todo_list;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'App\Http\Controllers\AuthController@index')->name('login');

Route::group(['middleware' => 'disable_back_btn'], function () {

    Route::get('create', 'App\Http\Controllers\TodoListController@create'); 

    Route::get('save_new_list', 'App\Http\Controllers\TodoListController@store'); 

    Route::get('delete/{id}', 'App\Http\Controllers\TodoListController@destroy'); 

    Route::get('edit/{id}', 'App\Http\Controllers\TodoListController@edit'); 

    Route::get('update_list/{id}', 'App\Http\Controllers\TodoListController@update'); 
});


    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    });


Route::group(['middleware' => 'disable_back_btn'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/home', [HomeController::class, 'index']);
        Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
