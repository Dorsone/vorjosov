<?php

use App\Http\Controllers\Api\v1\EventController;
use App\Http\Controllers\Api\v1\MyObjectController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::get('', [EventController::class, 'index'])->name('index');
        Route::post('', [EventController::class, 'store'])->name('store');
    });
    Route::group(['prefix' => 'my-objects', 'as' => 'my-objects.'], function () {
        Route::get('', [MyObjectController::class, 'index'])->name('index');
        Route::post('{object}', [MyObjectController::class, 'store'])->name('store');
    });
});
