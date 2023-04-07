<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BrainBalanceController;
use App\Http\Controllers\Admin\OnboardingController;
use App\Http\Controllers\Admin\SelfCareController;
use App\Http\Controllers\Admin\TherapistController;
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

// =================SUPER ADMIN PANERL ROUTES START=======================

Route::prefix('admin')->group(function () {
    // ============ADMIN AUTH ROUTES START============
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('login', 'adminLoginView')->name('admin.loginGet');
        Route::post('login', 'adminLogin')->name('admin.loginPost');

        Route::get('logout', function () {
            session()->forget('adminUser_name');
            return redirect()->route('admin.loginGet');
        })->name('admin.logout');
    });     // ADMIN AUTH ROUTES END


    // ==============ADMIN HOME CONTROLLER ROUTE START================
    Route::controller(AdminHomeController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('admin.dashboard');
    });   //ADMIN HOME CONTROLLER CLOSEUP

    //==============Onboarding Questions Route Start==============
    Route::controller(OnboardingController::class)->group(function () {
        Route::get('onboarding', 'onboardingQueIndex')->name('admin.onboardingQueIndex');
        Route::get('view-onboarding/{id}', 'onboardingQuesViewFrom')->name('admin.onboardingQuesViewFrom');

        Route::get('add-onboarding', 'onboardingQuesAddFrom')->name('admin.onboardingQuesAddFrom');
        Route::post('add-onboarding', 'onboardingQuesStore')->name('admin.onboardingQuesStore');

        Route::get('edit-onboarding/{id}', 'onboardingQuesEditFrom')->name('admin.onboardingQuesEditFrom');
        Route::post('edit-onboarding', 'onboardingQuesUpdate')->name('admin.onboardingQuesUpdate');

        Route::get('delete-onboarding/{id}', 'onboardingQuesDelete')->name('admin.onboardingQuesDelete');
    });   //ADMIN ONBOARDING CONTROLLER CLOSEUP

    /*
        |---------------------------------------------------------------------
        | BRAIN BALANCE CATEGORY AND SUBCATEGORY CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */

    Route::controller(BrainBalanceController::class)->group(function () {
        // -----------------CATEGORY ROUTES-------------------
        Route::get('brainBalance-category', 'category')->name('admin.brainCategory');
        Route::get('brainBalance-view-category/{id}', 'categoryViewForm')->name('admin.brainCateViewForm');

        Route::get('brainBalance-add-category', 'categoryAddForm')->name('admin.brainCateAddForm');
        Route::post('brainBalance-add-category', 'categoryStore')->name('admin.brainCateStore');

        Route::get('brainBalance-edit-category/{id}', 'categoryEditForm')->name('admin.brainCateEditForm');
        Route::post('brainBalance-edit-category', 'categoryUpdate')->name('admin.brainCateUpdate');

        Route::get('brainBalance-delete-category/{id}', 'categoryDelete')->name('admin.brainCategoryDelete');
        Route::get('brainBalance-detetes-category/{ids}', 'categoryDelete')->name('admin.brainCategoryDeletes');


        // -----------------SUB-CATEGORY ROUTES START-------------------

        Route::get('brainBalance-SubCategory', 'subCategory')->name('admin.brainSubCategory');
        Route::get('brainBalance-view-SubCategory/{id}', 'subCategoryViewForm')->name('admin.brainSubCateViewForm');

        Route::get('brainBalance-add-SubCategory', 'subCategoryAddForm')->name('admin.brainSubCateAddForm');
        Route::post('brainBalance-add-SubCategory', 'subCategoryStore')->name('admin.BrainSubCateStore');

        Route::get('brainBalance-edit-SubCategory/{id}', 'subCategoryEditForm')->name('admin.brainSubCateEditForm');
        Route::post('brainBalance-edit-SubCategory', 'subCategoryUpdate')->name('admin.brainSubCateUpdate');

        Route::get('brainBalance-delete-SubCategory/{id}', 'subCategoryDelete')->name('admin.brainSubCategoryDelete');
        Route::get('brainBalance-detetes-SubCategory/{ids}', 'subCategoryDelete')->name('admin.brainSubCategoryDeletes');


        // ------------------------CONTENT ROUTES START-------------------------

        Route::get('brainBalance-contents', 'content')->name('admin.brainBalContent');
        Route::get('brainBalance-view-contents/{id}', 'contentViewFrom')->name('admin.contentViewFrom');

        Route::get('brainBalance-add-contents', 'contentAddFrom')->name('admin.brainBalContentAddFrom');
        Route::post('brainBalance-add-contents', 'contentStore')->name('admin.brainBalContentStore');

        Route::get('brainBalance-edit-contents/{id}', 'contentEditFrom')->name('admin.brainBalContentEditFrom');
        Route::post('brainBalance-edit-contents', 'contentUpdate')->name('admin.brainBalContentUpdate');

        Route::get('brainBalance-delete-contents/{id}', 'contentDelete')->name('admin.brainBalContentDelete');
    });       //ADMIN BRAIN BALANCE CONTROLLER CLOSEUP

    /*
        |---------------------------------------------------------------------
        |  SELF CARE CATEGORY AND SUBCATEGORY CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */

    Route::controller(SelfCareController::class)->group(function () {
        // -----------------SELF CARE CATEGORY ROUTES-------------------
        Route::get('selfCare-category', 'selfCategory')->name('admin.selfCategory');
        Route::get('selfCare-view-category/{id}', 'selfCategoryView')->name('admin.selfCategoryView');

        Route::get('selfCare-add-category', 'selfCategoryAddForm')->name('admin.selfCategoryAddForm');
        Route::post('selfCare-add-category', 'selfCategoryStore')->name('admin.selfCategoryStore');

        Route::get('selfCare-edit-category/{id}', 'selfCategoryEditForm')->name('admin.selfCategoryEditForm');
        Route::post('selfCare-edit-category', 'selfCategoryUpdate')->name('admin.selfCategoryUpdate');

        Route::get('selfCare-delete-category/{id}', 'selfCategoryDelete')->name('admin.selfCategoryDelete');

        // -----------------SELF CARE CONTENTS ROUTES-------------------


    });  //ADMIN SELF CARE CONTROLLER CLOSEUP

    /*
        |---------------------------------------------------------------------
        |  THERAPIST CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */

    Route::controller(TherapistController::class)->group(function () {
        // -------------------------THERAPIST CRUD ROUTES START--------------------
        Route::get('therapist-list', 'therapistList')->name('admin.therapist');
        Route::get('therapist-view/{id}', 'therapistViewForm')->name('admin.therapistViewForm');

        Route::get('therapist-add', 'therapistAddForm')->name('admin.therapistAddForm');
        Route::post('therapist-store', 'therapistStore')->name('admin.therapistStoreData');

        Route::get('therapist-edit/{id}', 'therapistEditForm')->name('admin.therapistEditForm');
        Route::post('therapist-add', 'therapistUpdate')->name('admin.therapistUpdate');

        Route::get('therapist-delete/{id}', 'therapistDelete')->name('admin.therapistDelete');
        // -------------------------THERAPIST CRUD ROUTES END--------------------

    });  //ADMIN THERAPIST CONTROLLER CLOSEUP



    /*
        |---------------------------------------------------------------------
        |  APPOINTMENTS CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */
        // -------------------------------APPOINTMENTS CRUD START-------------------
    Route::controller(AppointmentController::class)->group(function () {
        Route::get('appointments', 'appointments')->name('admin.appointments');
        Route::get('appointments-view/{id}', 'appointmentsView')->name('admin.appointmentsView');

        Route::get('appointments-add', 'appointmentsAddForm')->name('admin.appointmentsAddForm');
        Route::post('appointments-store', 'appointmentsStore')->name('admin.appointmentsStore');

        Route::get('appointments-edit/{id}', 'appointmentsEditForm')->name('admin.appointmentsEditForm');
        Route::post('appointments-edit', 'appointmentsUpdate')->name('admin.appointmentsUpdate');

        Route::get('appointments-delete/{id}', 'appointmentsDelete')->name('admin.appointmentsDelete');


        // -------------------------------APPOINTMENTS CRUD END-------------------

    });   //APPOINTMENTS CONTROLLER CLOSEUP



});   //ADMIN PREFIX CLOSEUP

// =================SUPER ADMIN PANERL ROUTES START=======================















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


// ========THERAPIST ROUTES START===========
Route::prefix('therapist')->group(function () {
    // THRAPIST AUTH CONTROLLER ROUTE START
    Route::controller(TherapistAuthController::class)->group(function () {
    }); // THRAPIST AUTH CONTROLLER ROUTE END
});

Route::group(['prefix' => 'therapist', 'middleware' => ['auth']], function () {
    // THERAPIST HOME CONTROLLER ROUTE START
    Route::controller(TherapistHomeController::class)->group(function () {
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
