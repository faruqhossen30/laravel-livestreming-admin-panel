<?php

use App\Http\Controllers\API\Auth\AuthController;
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
    // User Info

    // Profile
    // Route::post('profile/name', [ProfileController::class, 'name']);
    // Route::post('profile/avatar', [ProfileController::class, 'avatar']);
    // Route::post('profile/address', [ProfileController::class, 'address']);
    // // Post
    // Route::post('post/store', [PostController::class, 'store']);
    // Route::post('post/update/{post}', [PostController::class, 'update']);
    // Route::post('post/destroy/{post}', [PostController::class, 'destroy']);
    // Route::post('post/like/{id}', [PostlikeController::class, 'postLike']);
    // // Poll
    // Route::post('poll/option/attendance/{id}', [PollattendanceController::class, 'pollStore']);
    // // Follow
    // Route::get('followers', [FollowerController::class, 'followerList']);
    // Route::get('following', [FollowerController::class, 'followwingList']);
    // Route::post('follow/{id}', [FollowerController::class, 'followRequest']);
    // Route::get('/follow/suggestion', [PeoplelistController::class, 'suggestionPeople']);

});
