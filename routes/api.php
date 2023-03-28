<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HomeController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'auth'], function () {
    Route::controller(AuthController::class)->group(function(){
        Route::post('/register', 'register')->name('register');
        Route::post('/login', 'login');
        Route::post('/google-login', 'loginWithGoogle');
        Route::post('forgot-password','forgotPassword')->name('forgotPassword');
        Route::post('/verify-otp','verifyOtp')->name('verifyOtp');
        Route::post('/reset-password','resetPassword')->name('resetPassword');
    });
   
});

    Route::controller(HomeController::class)->group(function(){
        // Route::post('/get-user', 'onboardingQues')->name('getUser');
        Route::post('/profile-update', 'profileUpdate')->name('profileUpdate');
        Route::get('/onboarding-questions-option', 'onboardingQuesOption')->name('onboardingQuesOption');
        Route::post('/user-onboarding', 'onboardingQuesAnsStore')->name('onboardingQuesAnsStore');

       
    });
   
