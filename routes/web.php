<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\landing\LandingController;

use App\Http\Controllers\dashboard\MemberController;
use App\Http\Controllers\dashboard\MyOrderController;
use App\Http\Controllers\dashboard\ProfileController;
use App\Http\Controllers\dashboard\RequestController;
use App\Http\Controllers\dashboard\ServiceController;


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

Route::get('detail_booking/{id}', [LandingController::class, 'detail_booking'])->name('detail.booking.landing');
Route::get('booking/{id}', [LandingController::class, 'booking'])->name('booking.landing');
Route::get('detail/{id}', [LandingController::class, 'detail'])->name('detail.landing');
Route::get('explore', [LandingController::class, 'explore'])->name('explore.landing');
Route::resource('/', LandingController::class);

Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth:sanctum','verified']], function(){

    Route::resource('dashboard', MemberController::class);

    Route::resource('service', ServiceController::class);

    Route::get('approve_request/{id}', [RequestController::class, 'approve'])->name('approve.request');
    Route::resource('request', RequestController::class);

    Route::get('accept/order/{id}', [MyOrderController::class, 'accepted'])->name('accepted.order');
    Route::get('reject/order/{id}', [MyOrderController::class, 'rejected'])->name('rejected.order');
    Route::resource('order', MyOrderController::class);

    Route::get('delete_profile/{id}', [ProfileController::class, 'delete'])->name('delete.photo.profile');
    Route::resource('profile', ProfileController::class);

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
