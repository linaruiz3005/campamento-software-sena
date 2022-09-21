<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BootcampController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReviewController;


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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Primera ruta REST
Route::get('prueba', function(){
    echo "Hola";
});

//vincular el controlador bootcamp asis rutas
Route::apiResource('bootcamps', BootcampController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('courses', CourseController::class);