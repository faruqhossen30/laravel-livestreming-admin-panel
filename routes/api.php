<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\OtpverifyController;
use App\Http\Controllers\API\User\ProfileController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    // Profile
    Route::prefix('user')->group(function () {
        // OTP
        Route::post('/send-otp', [OtpverifyController::class, 'sendOTP']);
        Route::get('/otp-verify/{opt}', [OtpverifyController::class, 'otpVerify']);

        Route::post('/avatar', [ProfileController::class, 'avatar']);
        Route::post('/change-number/{number}', [ProfileController::class, 'changeNumber']);
    });

});
