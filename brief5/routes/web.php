<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandlordDashboardController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLocationController;
use App\Http\Controllers\Admin\AdminPropertyController;
use App\Http\Controllers\Admin\AdminPropertyTypeController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Models\Role;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Controllers\AuthController;


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


// Roles
Route::resource('roles', RoleController::class);

// Users
Route::resource('users', UserController::class);

// Properties
Route::resource('properties', PropertyController::class, [ 'except' => [ 'index']]);

// PropertyTypes
Route::resource('property_types', PropertyTypeController::class);

// Locations
Route::resource('locations', LocationController::class);

// Bookings
// Route::resource('bookings', BookingController::class);

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




Route::middleware(['auth','web', CheckRoleMiddleware::class])->group(function () {
    //only admin page
    


// List users
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');



// Index page to list all roles
Route::get('/admin/roles', [AdminRoleController::class, 'index'])->name('admin.roles.index');
Route::get('/admin/roles/{role}', [AdminRoleController::class, 'show'])->name('admin.roles.show');
Route::get('/admin/roles/create', [AdminRoleController::class, 'create'])->name('admin.roles.create');
Route::post('/admin/roles', [AdminRoleController::class, 'store'])->name('admin.roles.store');
Route::get('/admin/roles/{role}/edit', [AdminRoleController::class, 'edit'])->name('admin.roles.edit');
Route::put('/admin/roles/{role}', [AdminRoleController::class, 'update'])->name('admin.roles.update');
Route::delete('/admin/roles/{role}', [AdminRoleController::class, 'destroy'])->name('admin.roles.destroy');






// Index page to list all properties
Route::get('/admin/properties', [AdminPropertyController::class, 'index'])->name('admin.properties.index');
Route::get('/admin/properties/{property}', [AdminPropertyController::class, 'show'])->name('admin.properties.show');
Route::get('/admin/properties/create', [AdminPropertyController::class, 'create'])->name('admin.properties.create');
Route::post('/admin/properties', [AdminPropertyController::class, 'store'])->name('admin.properties.store');
Route::get('/admin/properties/{property}/edit', [AdminPropertyController::class, 'edit'])->name('admin.properties.edit');
Route::put('/admin/properties/{property}', [AdminPropertyController::class, 'update'])->name('admin.properties.update');
Route::delete('/admin/properties/{property}', [AdminPropertyController::class, 'destroy'])->name('admin.properties.destroy');




// Index page to list all property types
Route::get('/admin/property_types', [AdminPropertyTypeController::class, 'index'])->name('admin.property_types.index');
Route::get('/admin/property_types/{propertyType}', [AdminPropertyTypeController::class, 'show'])->name('admin.property_types.show');
Route::get('admin/property_types/create', [AdminPropertyTypeController::class, 'create'])->name('admin.property_types.create');
Route::post('/admin/property_types', [AdminPropertyTypeController::class, 'store'])->name('admin.property_types.store');
Route::get('/admin/property_types/{propertyType}/edit', [AdminPropertyTypeController::class, 'edit'])->name('admin.property_types.edit');
Route::put('/admin/property_types/{propertyType}', [AdminPropertyTypeController::class, 'update'])->name('admin.property_types.update');
Route::delete('/admin/property_types/{propertyType}', [AdminPropertyTypeController::class, 'destroy'])->name('admin.property_types.destroy');




// Index page to list all locations
Route::get('/admin/locations', [AdminLocationController::class, 'index'])->name('admin.locations.index');
Route::get('/admin/locations/{location}', [AdminLocationController::class, 'show'])->name('admin.locations.show');
Route::get('/admin/locations/create', [AdminLocationController::class, 'create'])->name('admin.locations.create');
Route::post('/admin/locations', [AdminLocationController::class, 'store'])->name('admin.locations.store');
Route::get('/admin/locations/{location}/edit', [AdminLocationController::class, 'edit'])->name('admin.locations.edit');
Route::put('/admin/locations/{location}', [AdminLocationController::class, 'update'])->name('admin.locations.update');
Route::delete('/admin/locations/{location}', [AdminLocationController::class, 'destroy'])->name('admin.locations.destroy');




// routes/web.php


// Index page to list all bookings
Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
Route::get('/admin/bookings/{booking}', [AdminBookingController::class, 'show'])->name('admin.bookings.show');
Route::get('/admin/bookings/create', [AdminBookingController::class, 'create'])->name('admin.bookings.create');
Route::post('/admin/bookings', [AdminBookingController::class, 'store'])->name('admin.bookings.store');
Route::get('/admin/bookings/{booking}/edit', [AdminBookingController::class, 'edit'])->name('admin.bookings.edit');
Route::put('/admin/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
Route::delete('/admin/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');






// Show all reviews
Route::get('admin/reviews', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
Route::get('admin/reviews/{review}', [AdminReviewController::class, 'show'])->name('admin.reviews.show');
Route::get('admin/reviews/create', [AdminReviewController::class, 'create'])->name('admin.reviews.create');
Route::post('admin/reviews', [AdminReviewController::class, 'store'])->name('admin.reviews.store');
Route::get('admin/reviews/{review}/edit', [AdminReviewController::class, 'edit'])->name('admin.reviews.edit');
Route::put('admin/reviews/{review}', [AdminReviewController::class, 'update'])->name('admin.reviews.update');
Route::delete('admin/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('admin.reviews.destroy');


Route::get('/admin/creatings/user',function(){
    $roles = Role::all();
    return view('admin/creatings/user',compact('roles'));
})->name('admin.creatings.user');

Route::get('/admin/creatings/property_types',function(){
    return view('admin/creatings/property_types');
})->name('admin.creatings.property_types');

Route::get('/admin/creatings/locations',function(){
    return view('admin/creatings/locations');
})->name('admin.creatings.locations');

// Route::get('/admin/dashboard',function(){
//     return view('/admin/dashboard');
// })->name('admin.killme');


// use App\Http\Controllers\Admin\AdminDashboardController;

// Admin Dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'statistics'])->name('admin.dashboard.statistics');
// <<<<<<< HEAD
///////////////////////////////////////////////
//
});


// malek is the best
// >>>>>>> fc534728eba5825335562cf4bb5ebdedd0dd1510



// this the dashboarduser cotroller

    Route::get('/dashboard', [DashboardUserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/profile/{id}', [DashboardUserController::class, 'profile'])->name('user.profile');
    Route::put('/user/profile/update/{id}', [DashboardUserController::class, 'updateProfile'])->name('user.profile.update');
    Route::post('/change-password', [DashboardUserController::class, 'changePassword'])->name('user.changePassword');
    Route::get('/user/booked-properties', [DashboardUserController::class,'bookedProperties'])->name('user.booking');
    Route::delete('/user/bookings/{id}', [DashboardUserController::class,'delete'])->name('user.booking.delete');
    Route::get('/user/reviews', [DashboardUserController::class, 'userReviews'])->name('user.reviews');


    //home
    Route::get('/',  PropertyController::class.'@index')->name('properties.index');


    //auth
Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/sign_up', 'sign_up')->name('sign_up');
    Route::get('/login1', 'login1')->name('login1');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/dash', 'dash')->name('dash');
});

//booking only for login users
Route::middleware('auth')->group(function () {
    Route::resource('bookings', BookingController::class);

});