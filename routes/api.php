<?php

use App\Http\Controllers\API\AgoraController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\OtpverifyController;
use App\Http\Controllers\API\FcmtokenController;
use App\Http\Controllers\API\ForgetpasswordController;
use App\Http\Controllers\API\ListapiController;
use App\Http\Controllers\API\OptionapiController;
use App\Http\Controllers\API\RtctokenController;
use App\Http\Controllers\API\RtmctokenController;
use App\Http\Controllers\API\User\BlockController;
use App\Http\Controllers\API\User\BuydaimondController;
use App\Http\Controllers\API\User\DepositController;
use App\Http\Controllers\API\User\FollowerController;
use App\Http\Controllers\API\User\ProfileController;
use App\Http\Controllers\API\User\UserapiController;
use App\Http\Controllers\API\User\WithdrawController;
use App\Http\Controllers\API\User\WithdrawsettingController;
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


Route::post('/checkuser', [AuthController::class, 'checkUser']);
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);
Route::post('/registernew', [AuthController::class, 'registerNew']);
Route::post('/send-otp', [OtpverifyController::class, 'sendNewOtp']);

// Forget Password
Route::post('/forget-password', [ForgetpasswordController::class, 'forgetPassword']);
Route::post('/forget-password/otp-verify', [ForgetpasswordController::class, 'forgetPasswordOtpVerify']);
Route::post('/forget-password/changepassword/confirm', [ForgetpasswordController::class, 'changePasswordConfirm']);
Route::post('/verify-otp', [OtpverifyController::class, 'verifyOtp']);
// Route::post('/forget-password/send-otp', [ForgetpasswordController::class, 'sendOTP']);



Route::middleware('auth:sanctum')->group(function () {
    // Profile
    Route::prefix('user')->group(function () {
        // OTP
        Route::post('/send-otp', [OtpverifyController::class, 'sendOTP']);
        Route::post('/otp-verify/{otp}', [OtpverifyController::class, 'otpVerify']);
        Route::post('buy-daimond', [BuydaimondController::class, 'buyDaimond']);
        // Update
        Route::post('/avatar', [ProfileController::class, 'avatar']);
        Route::post('/change-name', [ProfileController::class, 'changeName']);

        Route::post('/change-password', [ProfileController::class, 'changePassword']);
        Route::post('/golive/{rtctoken}', [ProfileController::class, 'goLive']);
        Route::get('/leavelive', [ProfileController::class, 'leaveLive']);

        // Generate Token
        Route::get('/rcttoken/host', [RtctokenController::class, 'generate']);
        Route::get('/rtmtoken/host', [RtmctokenController::class, 'generate']);

        // FCM Token
        Route::post('/fcmtoken/store', [FcmtokenController::class, 'storeFcm']);
        // Deposit
        Route::post('/deposit', [DepositController::class, 'store']);
        Route::get('/deposits', [DepositController::class, 'index']);
        // API List
        Route::get('/notices', [UserapiController::class, 'allNotice']);
        Route::get('/notifications', [UserapiController::class, 'notifications']);
        Route::get('/api/notice/{id}', [UserapiController::class, 'singleNotice']);
        // Follower
        Route::get('/followers', [FollowerController::class, 'followers']);
        Route::get('/followings', [FollowerController::class, 'followings']);
        Route::post('/follower/checkfollower', [FollowerController::class, 'checkfollower']);
        Route::post('/follower/follow', [FollowerController::class, 'follow']);
        Route::post('/follower/follow/accept', [FollowerController::class, 'followAccept']);
        Route::post('/follower/unfollow', [FollowerController::class, 'unFollow']);
        // Block
        Route::get('/blocks', [BlockController::class, 'blockList']);
        Route::post('/block/block', [BlockController::class, 'block']);
        Route::post('/block/unblock', [BlockController::class, 'unBlock']);
        // Withdraw
        Route::get('/withdrawsetting', [WithdrawsettingController::class, 'index']);
        Route::get('/withdraws', [WithdrawController::class, 'index']);
        Route::post('/withdraw', [WithdrawController::class, 'store']);

    });
});

Route::get('/agora', [AgoraController::class, 'index']);
Route::get('/agora/appid', [AgoraController::class, 'appId']);

// Route::get('/rcttoken/host', [RtctokenController::class, 'generate']);
// Route::get('/rtmtoken/host', [RtmctokenController::class, 'generate']);

Route::get('/payment-gateways', [ListapiController::class, 'paymentGateway']);
Route::get('/gifts', [ListapiController::class, 'giftList']);
Route::get('/labels', [ListapiController::class, 'userlabelList']);
Route::get('/memberships', [ListapiController::class, 'membershipList']);
Route::get('/helpline', [ListapiController::class, 'helpline']);

Route::get('/option/agora', [OptionapiController::class, 'agora']);
Route::get('/option/daimond-rate', [OptionapiController::class, 'daimondRate']);
Route::get('/option/daimondwidthdraw-rate', [OptionapiController::class, 'daimondWidthRate']);
