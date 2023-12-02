<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandlordDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// routes/web.php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;

// Roles
Route::resource('roles', RoleController::class);

// Users
Route::resource('users', UserController::class);

// Properties
Route::resource('properties', PropertyController::class);

// PropertyTypes
Route::resource('property_types', PropertyTypeController::class);

// Locations
Route::resource('locations', LocationController::class);

// Bookings
Route::resource('bookings', BookingController::class);

// Reviews
Route::resource('reviews', ReviewController::class);





/////Landlord Dashboard controller






// Landlord Dashboard Routes

    Route::get('/landlord/dashboard', [LandlordDashboardController::class, 'index'])->name('landlord.dashboard.index');
    Route::get('/landlord/dashboard/create', [LandlordDashboardController::class, 'create'])->name('landlord.dashboard.create');
    Route::post('/landlord/dashboard/store', [LandlordDashboardController::class, 'store'])->name('landlord.dashboard.store');
    Route::get('/landlord/dashboard/edit/{property}', [LandlordDashboardController::class, 'edit'])->name('landlord.dashboard.edit');
    Route::put('/landlord/dashboard/update/{property}', [LandlordDashboardController::class, 'update'])->name('landlord.dashboard.update');
    Route::delete('/landlord/dashboard/destroy/{property}', [LandlordDashboardController::class, 'destroy'])->name('landlord.dashboard.destroy');
    Route::get('/landlord/dashboard/userProfile', [LandlordDashboardController::class, 'profile'])->name('land.profile');
    Route::put('/landlord/{user}', [LandlordDashboardController::class, 'updatepro'])->name('updatepro');
    Route::get('/landlord/reviews', [LandlordDashboardController::class, 'userReviews'])->name('land.reviews');
    Route::get('/landlord/booked-properties', [LandlordDashboardController::class,'bookedProperties'])->name('land.booking');
    Route::get('/landlord/booked-history', [LandlordDashboardController::class,'bookedhistory'])->name('user.history');
    Route::delete('/landlord/booking/{id}', [LandlordDashboardController::class, 'deleteBooking'])->name('landlord.booking.delete');



