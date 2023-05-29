<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\OtpverifyController;
use App\Http\Controllers\API\ForgetpasswordController;
use App\Http\Controllers\API\ListapiController;
use App\Http\Controllers\API\LiveuserController;
use App\Http\Controllers\API\OptionapiController;
use App\Http\Controllers\API\RtctokenController;
use App\Http\Controllers\API\RtmctokenController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\User\BuydaimondController;
use App\Http\Controllers\API\User\DepositController;
use App\Http\Controllers\API\User\LiveController;
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
// Forget Password
Route::post('/forget-password/{mobile}', [ForgetpasswordController::class, 'forgetPassword']);
Route::post('/forget-password/{mobile}/send-otp', [ForgetpasswordController::class, 'sendOTP']);



Route::middleware('auth:sanctum')->group(function () {
    // Profile
    Route::prefix('user')->group(function () {
        // OTP
        Route::post('/send-otp', [OtpverifyController::class, 'sendOTP']);
        Route::post('/otp-verify/{otp}', [OtpverifyController::class, 'otpVerify']);
        Route::post('/change-number/{number}', [ProfileController::class, 'changeNumber']);
        Route::post('buy-daimond', [BuydaimondController::class, 'buyDaimond']);
        // Update
        Route::post('/avatar', [ProfileController::class, 'avatar']);
        Route::post('/change-name', [ProfileController::class, 'changeName']);
        Route::post('/change-password', [ProfileController::class, 'changePassword']);
        Route::post('/golive/{rtctoken}', [ProfileController::class, 'goLive']);
        Route::get('/leavelive', [ProfileController::class, 'leaveLive']);
        // Live
        Route::get('/liveuser', [LiveController::class, 'index']);
        Route::get('/transaction', [TransactionController::class, 'index']);
        Route::post('/gift/send', [TransactionController::class, 'giftSend']);

        // Deposit
        Route::post('/deposit', [DepositController::class, 'store']);
        Route::get('/deposits', [DepositController::class, 'index']);

    });
});

Route::get('/liveuser', [LiveuserController::class, 'index']);
Route::get('/rcttoken/host', [RtctokenController::class, 'generate']);
Route::get('/rtmtoken/host', [RtmctokenController::class, 'generate']);

Route::get('/payment-gateways', [ListapiController::class, 'paymentGateway']);
Route::get('/gifts', [ListapiController::class, 'giftList']);
Route::get('/labels', [ListapiController::class, 'userlabelList']);
Route::get('/memberships', [ListapiController::class, 'membershipList']);

Route::get('/option/agora', [OptionapiController::class, 'agora']);
Route::get('/option/daimond-rate', [OptionapiController::class, 'daimondRate']);
Route::get('/option/daimondwidthdraw-rate', [OptionapiController::class, 'daimondWidthRate']);
