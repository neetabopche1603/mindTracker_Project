<?php

use App\Http\Controllers\Frontend\HomeController;
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

Route::controller(HomeController::class)->group(function(){
    // Index(HOME) Page Route
    Route::get('/','index')->name('index');
    // ABOUT US Page Route
    Route::get('about-us','aboutUs')->name('aboutUs');
    // contact-us Page Route
    Route::get('contact-us','contactUs')->name('contactUs');
    // blog Page Route
    Route::get('blog','blog')->name('blog');
    // fAQ Page Route
    Route::get('faq','fAQ')->name('fAQ');
    // privac-policy Page Route
    Route::get('privac-policy','privacyPolicy')->name('privacyPolicy');
    // tearms-of-service Page Route
    Route::get('tearms-of-service','tearmsOfService')->name('tearmsOfService');
    // Services Route Start
    Route::get('service','service')->name('service');
    Route::get('service/meditation','meditation')->name('service.meditation');
    Route::get('service/mood-tracking','moodTracking')->name('service.moodTracking');
    Route::get('service/journaling','journaling')->name('service.journaling');
    Route::get('service/licensed-therapist-access','licensedTherapistAccess')->name('service.licensedTherapistAccess');
    Route::get('service/community-support','communitySupport')->name('service.communitySupport');
    Route::get('service/self-care-tools','selfCareTools')->name('service.selfCareTools');
    // Services Route End
});

// =================FRONT-END ROUTES END=======================
