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

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\UserController::class, 'loginPost']);

Route::get('/register',[\App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/register',[\App\Http\Controllers\UserController::class, 'registerPost']);



Route::middleware('auth')->group(function (){
    Route::get('/cabinet',[\App\Http\Controllers\UserController::class, 'cabinet'])->name('cabinet');
    Route::get('/cabinet/edit',[\App\Http\Controllers\UserController::class, 'cabinetEdit'])->name('cabinetEdit');
    Route::post('/cabinet/edit',[\App\Http\Controllers\UserController::class, 'cabinetEditPost']);
    Route::get('/logout',[\App\Http\Controllers\UserController::class, 'logout'])->name('logout');
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'allusers'])->name('allusers');
    Route::post('/search', [\App\Http\Controllers\UserController::class, 'search'])->name('search');
    Route::get('/addFriend/{friend}',[\App\Http\Controllers\UserController::class, 'addFriend'])->name('addFriend');
    Route::get('/friends',[\App\Http\Controllers\UserController::class, 'friends'])->name('friends');
    Route::get('/friend/{friend}', [\App\Http\Controllers\UserController::class, 'friend'])->name('friend');
    Route::delete('/destroy/{friend}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('destroy');
    Route::resource('/chat', \App\Http\Controllers\DialogChatController::class);
    Route::post('/chat/send/{chat}', [\App\Http\Controllers\DialogChatController::class, 'send'])->name('newMessage');
    Route::get('/dialog', [\App\Http\Controllers\DialogChatController::class, 'dialogs'])->name('dialogs');
});
