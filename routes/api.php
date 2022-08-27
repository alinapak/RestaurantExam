<?php

use App\Http\Controllers\ApiControllers\ApiDishController;
use App\Http\Controllers\ApiControllers\ApiMenuController;
use App\Http\Controllers\ApiControllers\ApiRestaurantController;
use App\Http\Controllers\ApiControllers\AuthController;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Restaurant;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'v1'], function () {
    Route::resource('/restaurants', ApiRestaurantController::class);
    Route::resource('/menus', ApiMenuController::class);
    Route::resource('/dishes', ApiDishController::class);
    Route::get('search/{key?}', [ApiRestaurantController::class, 'searchRestaurant']);
});
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});