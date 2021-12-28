<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankAccountDetailController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\TimeSlotController;
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
})->name('welcome');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::prefix('timeslot')->group(function () {

        Route::get('/view', [TimeSlotController::class, 'TimeSlotView'])->name('time_slot.view');

        Route::get('/add', [TimeSlotController::class, 'TimeSlotAdd'])->name('time_slot.add');

        Route::post('/store', [TimeSlotController::class, 'TimeSlotStore'])->name('time_slot.store');

        Route::get('/edit/{id}', [TimeSlotController::class, 'TimeSlotEdit'])->name('time_slot.edit');

        Route::post('/update/{id}', [TimeSlotController::class, 'TimeSlotUpdate'])->name('time_slot.update');

        Route::get('/delete/{id}', [TimeSlotController::class, 'TimeSlotDelete'])->name('time_slot.delete');
    });

    Route::prefix('pricing')->group(function () {

        Route::get('/view', [PricingController::class, 'PricingView'])->name('pricing.view');

        Route::get('/add', [PricingController::class, 'PricingAdd'])->name('pricing.add');

        Route::post('/store', [PricingController::class, 'PricingStore'])->name('pricing.store');

        Route::get('/edit/{id}', [PricingController::class, 'PricingEdit'])->name('pricing.edit');

        Route::post('/update/{id}', [PricingController::class, 'PricingUpdate'])->name('pricing.update');

        Route::get('/delete/{id}', [PricingController::class, 'PricingDelete'])->name('pricing.delete');
    });
    Route::prefix('bank-account-detail')->group(function () {

        Route::get('/view', [BankAccountDetailController::class, 'BankAccountDetailView'])->name('qr_code.view');

        Route::get('/add', [BankAccountDetailController::class, 'BankAccountDetailAdd'])->name('qr_code.add');

        Route::post('/store', [BankAccountDetailController::class, 'BankAccountDetailStore'])->name('qr_code.store');

        Route::get('/edit/{id}', [BankAccountDetailController::class, 'BankAccountDetailEdit'])->name('qr_code.edit');

        Route::post('/update/{id}', [BankAccountDetailController::class, 'BankAccountDetailUpdate'])->name('qr_code.update');

        Route::get('/delete/{id}', [BankAccountDetailController::class, 'BankAccountDetailDelete'])->name('qr_code.delete');
    });
});
Route::get('/admin/profile', [MainAdminController::class, 'AdminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [MainAdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store', [MainAdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

//User

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');



Route::get('/user/logout', [MainUserController::class, 'logout'])->name('user.logout');

Route::group(['middleware' => 'auth'], function () {

    Route::prefix('booking')->group(function () {

        Route::get('/view', [BookingController::class, 'BookingView'])->name('booking.view');

        Route::get('/add', [BookingController::class, 'BookingAdd'])->name('booking.add');

        Route::post('/store', [BookingController::class, 'BookingStore'])->name('booking.store');
    });
});
