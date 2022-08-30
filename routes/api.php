<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_order_controller;
use App\Http\Controllers\TestController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('orderdata',[Admin_order_controller::class,'Orderdata']);
Route::post('postApi',[TestController::class,'postapi']);
Route::get('getApi',[TestController::class,'getapi']);
Route::post('postDeleteApi',[TestController::class,'postdeleteapi']);
