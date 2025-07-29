<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\NotificationController;

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


//notify
Route::get('/notify', [ApiController::class, 'notify']);
Route::get('/notify/unsubscribe', [ApiController::class, 'unsub_notify']);
Route::post('/gamePoints', [ApiController::class, 'gamePoints']);
Route::post('/kickOffRemineder', [NotificationController::class, 'kickOffNotification']);
Route::post('/cardNotification', [NotificationController::class, 'cardNotification']);
Route::post('/goalNotification', [NotificationController::class, 'goalNotification']);
