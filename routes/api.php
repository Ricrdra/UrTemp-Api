<?php

use App\Http\Controllers\{ClassroomController, LogTempController, RoleController, StudentController, UserController};
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

Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');

Route::prefix('/v1')->middleware('login_required')->group(function () {
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/students', StudentController::class);
    Route::apiResource('/logs', LogTempController::class);
    Route::apiResource('/classrooms', ClassroomController::class);
});
