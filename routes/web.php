<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyObjectsController;
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

Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
    Route::get('', [EventsController::class, 'index'])->name('index');
    Route::delete('{event}', [EventsController::class, 'delete'])->name('delete');
    Route::get('{event}', [EventsController::class, 'show'])->name('show');
});

Route::group(['prefix' => 'objects', 'as' => 'objects.'], function () {
    Route::get('', [MyObjectsController::class, 'index'])->name('index');
    Route::delete('{object}', [MyObjectsController::class, 'delete'])->name('delete');
    Route::get('{object}', [MyObjectsController::class, 'show'])->name('show');
});

Route::get('', [HomeController::class, 'index'])->name('index');
Route::post('/send-request', [HomeController::class, 'sendRequest'])->name('send-request');
