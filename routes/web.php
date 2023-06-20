<?php

use App\Http\Controllers\ApkdownloadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TokenController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/token', [TokenController::class, 'index']);
Route::get('test', [TestController::class, 'showCollectionsAndDocuments']);
Route::get('test2', [TestController::class, 'two']);
Route::get('firebase', [TestController::class, 'firebase']);
Route::get('update', [TestController::class, 'updateUser']);
Route::get('/apk', [ApkdownloadController::class, 'apkDownload'])->name('downloadapk');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
