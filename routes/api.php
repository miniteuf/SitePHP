<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//protected root :
Route::post('games/add', [GameController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1/users')->group(function(){//ApiCollectionUser
    Route::post('/post',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);

    Route::group(['middleware'=>['auth:sanctum']], function(){
        //Protected root
        Route::post('/logout', [AuthController::class,'logout']);

    });

});
Route::prefix('v1/games')->group(function(){//ApiCollectionGame
    Route::group(['middleware'=>['auth:sanctum']], function(){
        Route::post('/post', [GameController::class,'store'])->name('post_game_api');
    });
    Route::get('/{id}', [GameController::class,'get']);
    
});

Route::get('v1/games', [GameController::class,'filtre']);