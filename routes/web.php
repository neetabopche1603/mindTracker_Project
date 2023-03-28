<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Therapist\TherapistAuthController;
use App\Http\Controllers\Therapist\TherapistHomeController;
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

// =================FRONT-END ROUTES START=======================
// Route::get('/', function () {
//     $data = url()->current();
//     return view('frontend.home',compact('data'));
// });

Route::get('/login', function () {
    return view('auth.frontend.signIn');
});

Route::get('/register', function () {
    return view('auth.frontend.signup');
});

Route::controller(HomeController::class)->group(function () {
    // Index(HOME) Page Route
    Route::get('/', 'index')->name('index');
    // ABOUT US Page Route
    Route::get('about-us', 'aboutUs')->name('aboutUs');
    // contact-us Page Route
    Route::get('contact-us', 'contactUs')->name('contactUs');
    // blog Page Route
    Route::get('blog', 'blog')->name('blog');
    // fAQ Page Route
    Route::get('faq', 'fAQ')->name('fAQ');
    // privac-policy Page Route
    Route::get('privac-policy', 'privacyPolicy')->name('privacyPolicy');
    // tearms-of-service Page Route
    Route::get('tearms-of-service', 'tearmsOfService')->name('tearmsOfService');
    // Services Route Start
    Route::get('service', 'service')->name('service');
    Route::get('service/meditation', 'meditation')->name('service.meditation');
    Route::get('service/mood-tracking', 'moodTracking')->name('service.moodTracking');
    Route::get('service/journaling', 'journaling')->name('service.journaling');
    Route::get('service/licensed-therapist-access', 'licensedTherapistAccess')->name('service.licensedTherapistAccess');
    Route::get('service/community-support', 'communitySupport')->name('service.communitySupport');
    Route::get('service/self-care-tools', 'selfCareTools')->name('service.selfCareTools');
    // Services Route End
});

// =================FRONT-END ROUTES END=======================


// =================BACK-END ROUTES START=======================

Route::prefix('admin')->group(function () {
    // ADMIN AUTH ROUTES START
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('login', 'adminLoginView')->name('admin.loginGet');
        Route::post('login', 'adminLogin')->name('admin.loginPost');

        Route::get('logout', function () {
            session()->forget('adminUser_name');
            return redirect()->route('admin.loginGet');
        })->name('admin.logout');
    });
    // ADMIN AUTH ROUTES END

    // ==============ADMIN HOME CONTROLLER ROUTE START================
    Route::controller(AdminHomeController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('admin.dashboard');
    });
    // ==============ADMIN HOME CONTROLLER ROUTE START================

});   //ADMIN PREFIX CLOSEUP



// ========THERAPIST ROUTES START===========
Route::prefix('therapist')->group(function () {
    // THRAPIST AUTH CONTROLLER ROUTE START
         Route::controller(TherapistAuthController::class)->group(function () {
            
    }); // THRAPIST AUTH CONTROLLER ROUTE END
});


Route::group(['prefix' => 'therapist', 'middleware' => ['auth']], function () {
    // THERAPIST HOME CONTROLLER ROUTE START
    Route::controller(TherapistHomeController::class)->group(function(){
        Route::get('dashboard', 'dashboard')->name('therapist.dashboard');
    });  // THERAPIST HOME CONTROLLER ROUTE END

});  //THERAPIST PREFIX AND MIDDLEWARE CLOSEUP

// ===========THERAPIST ROUTES END======





// =====================DEMO FILE ROUTE START========================
Route::get('demo', function () {
    return view('backend.demo.index');
})->name('demo.demo');
Route::get('add', function () {
    return view('backend.demo.add');
})->name('demo.add');
Route::get('edit', function () {
    return view('backend.demo.edit');
})->name('demo.edit');
// =====================DEMO FILE ROUTE END========================
