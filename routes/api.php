<?php

use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * @param 
 * route group for auth roles
 */
Route::prefix('auth')->group(
     function ()
    {
        Route::post('/login', [LoginController::class, 'login'])->name('login.login');
        Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

        Route::post('/register', [RegisterController::class, 'register'])->name('register.register');

    }
);

//authenticate route
Route::prefix('auth')->middleware('auth:sanctum')->group(
    function(){

        Route::post('/store',[TaskController::class,'store'])->name('task.store');

        //only user creator from post can delete or edit their task
        Route::put('/update/{id}',[TaskController::class,'update'])->name('task.update');
        Route::delete('/delete/{id}', [TaskController::class, 'destroy'])->name('task.destroy');



    }
);

//public route 
Route::get('/v1/task',[TaskController::class,'index'])->name('task.index');
Route::get('/v1/task/{id}',[TaskController::class,'show'])->name('task.show');
