<?php

use App\Http\Controllers\{AuthController,
    ClassroomController,
    LogTempController,
    RoleController,
    StudentController,
    UserController
};
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

//Route::post('/login', 'AuthController@login');
//Route::post('/register', 'AuthController@register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::prefix('/v1')->group(function () {

    Route::get('/roles/users/{role}', [UserController::class, 'getByRole']);
    Route::get('/roles', [RoleController::class, 'index']);


    Route::apiResource('/students', StudentController::class);

    Route::apiResource('/users', UserController::class);
    Route::apiResource('/logs', LogTempController::class);
    Route::apiResource('/classrooms', ClassroomController::class);
});
