<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/',[HomeController::class ,'index']);

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::post('/addgame', [GameController::class, 'add'])->middleware(['auth'])->name('post_game');

Route::post('/editname', [UserController::class, 'edit_name'])->middleware(['auth'])->name('edit_name');

require __DIR__.'/auth.php';
