<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\BrainBalanceController;
use App\Http\Controllers\Admin\CommunitySupportGrpController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\MoodTrackController;
use App\Http\Controllers\Admin\OnboardingController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\SelfCareController;
use App\Http\Controllers\Admin\TherapistController;
use App\Http\Controllers\Admin\UserController;
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

       // ADMIN PROFILE PAGE ROUTE
       Route::get('profiles', 'adminProfilePage')->name('admin.adminProfilePage');
       Route::post('profiles-update', 'adminprofileUpdate')->name('admin.adminprofileUpdate');
       Route::post('profiles-update-pass', 'adminChangePassword')->name('admin.adminChangePassword');

    });   //ADMIN HOME CONTROLLER CLOSEUP

    //==============Onboarding Questions Route Start==============
    Route::controller(OnboardingController::class)->group(function () {
         // ---------------ONBOARDING QUESTIONS AND OPTIONS CRUD ROUTES START------------------
        Route::get('onboarding', 'onboardingQueIndex')->name('admin.onboardingQueIndex');
        Route::get('view-onboarding/{id}', 'onboardingQuesViewFrom')->name('admin.onboardingQuesViewFrom');

        Route::get('add-onboarding', 'onboardingQuesAddFrom')->name('admin.onboardingQuesAddFrom');
        Route::post('add-onboarding', 'onboardingQuesStore')->name('admin.onboardingQuesStore');

        Route::get('edit-onboarding/{id}', 'onboardingQuesEditFrom')->name('admin.onboardingQuesEditFrom');
        Route::post('edit-onboarding', 'onboardingQuesUpdate')->name('admin.onboardingQuesUpdate');

        Route::get('delete-onboarding/{id}', 'onboardingQuesDelete')->name('admin.onboardingQuesDelete');

        // -------------ONBOARDING QUESTIONS AND OPTIONS CRUD ROUTES END------------------

       // --------------USERs ONBOARDING QUESTIONS AND ANS LIST SHOW ROUTES START---------
       Route::get('user-onboarding','showUserOnboardQuesAnsList')->name('admin.userOnboardQuesAnsList');
       Route::get('user-onboard-view/{id}','userOnboardQuesAnsView')->name('admin.userOnboardQuesAnsView');

       Route::get('user-onboard-delete/{id}','userOnboardQuesAnsDelete')->name('admin.userOnboardQuesAnsDelete');

       // --------------USERs ONBOARDING QUESTIONS AND ANS LIST SHOW ROUTES END-----------



    });   //ADMIN ONBOARDING CONTROLLER CLOSEUP

             /*
            |---------------------------------------------------------------------
            | BRAIN BALANCE CATEGORY AND SUBCATEGORY CONTROLLER ROUTE
            |---------------------------------------------------------------------
            */

     Route::controller(BrainBalanceController::class)->group(function () {
        // -----------------CATEGORY ROUTES-------------------
        Route::get('brainBalance-category', 'category')->name('admin.brainCategory');
        Route::get('brainBalance-category-view/{id}', 'categoryViewForm')->name('admin.brainCateViewForm');

        Route::get('brainBalance-category-add', 'categoryAddForm')->name('admin.brainCateAddForm');
        Route::post('brainBalance-category-add', 'categoryStore')->name('admin.brainCateStore');

        Route::get('brainBalance-category-edit/{id}', 'categoryEditForm')->name('admin.brainCateEditForm');
        Route::post('brainBalance-category-edit', 'categoryUpdate')->name('admin.brainCateUpdate');

        Route::get('brainBalance-category-delete/{id}', 'categoryDelete')->name('admin.brainCategoryDelete');
        Route::get('brainBalance-category-detetes/{ids}', 'multipleDeletecontentFiles')->name('admin.multipleDeletecontentFiles');


        // -----------------SUB-CATEGORY ROUTES START-------------------

        Route::get('brainBalance-SubCategory', 'subCategory')->name('admin.brainSubCategory');
        Route::get('brainBalance-SubCategory-view/{id}', 'subCategoryViewForm')->name('admin.brainSubCateViewForm');

        Route::get('brainBalance-SubCategory-add', 'subCategoryAddForm')->name('admin.brainSubCateAddForm');
        Route::post('brainBalance-SubCategory-add', 'subCategoryStore')->name('admin.BrainSubCateStore');

        Route::get('brainBalance-SubCategory-edit/{id}', 'subCategoryEditForm')->name('admin.brainSubCateEditForm');
        Route::post('brainBalance-SubCategory-edit', 'subCategoryUpdate')->name('admin.brainSubCateUpdate');

        Route::get('brainBalance-SubCategory-delete/{id}', 'subCategoryDelete')->name('admin.brainSubCategoryDelete');
        Route::get('brainBalance-SubCategory-detetes/{ids}', 'subCategoryDelete')->name('admin.brainSubCategoryDeletes');


        // ------------------------CONTENT ROUTES START-------------------------

        Route::get('brainBalance-contents', 'content')->name('admin.brainBalContent');
        Route::get('brainBalance-contents-view/{id}', 'contentViewFrom')->name('admin.contentViewFrom');

        Route::get('brainBalance-contents-add', 'contentAddFrom')->name('admin.brainBalContentAddFrom');
        Route::post('brainBalance-contents-add', 'contentStore')->name('admin.brainBalContentStore');

        Route::get('brainBalance-contents-edit/{id}', 'contentEditFrom')->name('admin.brainBalContentEditFrom');
        Route::post('brainBalance-contents-edit', 'contentUpdate')->name('admin.brainBalContentUpdate');

        // multiple image delete update time
        Route::post('brainBalance-filesDel', 'contentUpdateTimeDeleteImg')->name('admin.contentUpdateTimeDeleteImg');

        Route::get('brainBalance-contents-delete/{id}', 'contentDelete')->name('admin.brainBalContentDelete');
    });       //ADMIN BRAIN BALANCE CONTROLLER CLOSEUP

    /*
        |---------------------------------------------------------------------
        |  SELF CARE CATEGORY AND SUBCATEGORY CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */

    Route::controller(SelfCareController::class)->group(function () {
        // -----------------SELF CARE CATEGORY ROUTES-------------------
        Route::get('selfCare-category', 'selfCategory')->name('admin.selfCategory');
        Route::get('selfCare-category-view/{id}', 'selfCategoryView')->name('admin.selfCategoryView');

        Route::get('selfCare-category-add', 'selfCategoryAddForm')->name('admin.selfCategoryAddForm');
        Route::post('selfCare-category-add', 'selfCategoryStore')->name('admin.selfCategoryStore');

        Route::get('selfCare-category-edit/{id}', 'selfCategoryEditForm')->name('admin.selfCategoryEditForm');
        Route::post('selfCare-category-edit', 'selfCategoryUpdate')->name('admin.selfCategoryUpdate');

        Route::get('selfCare-category-delete/{id}', 'selfCategoryDelete')->name('admin.selfCategoryDelete');

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
        Route::get('therapist-deletes', 'therapistDestroy')->name('admin.therapistDestroy');
        // -------------------------THERAPIST CRUD ROUTES END--------------------

    });  //ADMIN THERAPIST CONTROLLER CLOSEUP

    /*
        |---------------------------------------------------------------------
        |  APPOINTMENTS CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */

    // -------------------------APPOINTMENTS ROUTES START-------------------
    Route::controller(AppointmentController::class)->group(function () {

        Route::get('appointments', 'appointments')->name('admin.appointments');
        Route::get('appointments-view/{id}', 'appointmentsView')->name('admin.appointmentsView');

        Route::get('appointments-add', 'appointmentsAddForm')->name('admin.appointmentsAddForm');
        Route::post('appointments-store', 'appointmentsStore')->name('admin.appointmentsStore');

        Route::get('appointments-edit/{id}', 'appointmentsEditForm')->name('admin.appointmentsEditForm');
        Route::post('appointments-edit', 'appointmentsUpdate')->name('admin.appointmentsUpdate');

        Route::post('appointments-delete/{id}', 'appointmentsDelete')->name('admin.appointmentsDelete');

        // -------------------------------APPOINTMENTS ROUTES END-------------------

    });   //APPOINTMENTS CONTROLLER CLOSEUP


    /*
        |---------------------------------------------------------------------
        |  REVIEWS & RATTING CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */
    // -------------------REVIEWS & RATTING START ROUTES------------------
    Route::controller(ReviewsController::class)->group(function () {

        Route::get('reviews', 'reviewsRatting')->name('admin.reviewsRatting');
        Route::get('reviews-view/{id}', 'reviewsView')->name('admin.reviewsView');

        Route::get('reviews-edit/{id}', 'reviewsEdit')->name('admin.reviewsEdit');
        Route::post('reviews-edit', 'reviewsUpdate')->name('admin.reviewsUpdate');

        Route::get('reviews-delete/{id}', 'reviewsDelete')->name('admin.reviewsDelete');
    }); // REVIEWS CONTROLLER CLOSEUP

    // ------------------REVIEWS & RATTING END ROUTES-------------------

        /*
        |---------------------------------------------------------------------
        | USERS CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */

    Route::controller(UserController::class)->group(function () {
        // -------------------------USERS CRUD ROUTES START--------------------
        Route::get('users-list', 'usersList')->name('admin.usersList');
        Route::get('users-view/{id}', 'userstViewForm')->name('admin.userstViewForm');

        Route::get('users-add', 'usersAddForm')->name('admin.usersAddForm');
        Route::post('users-store', 'usersStore')->name('admin.usersStore');

        Route::get('users-edit/{id}', 'usersEditForm')->name('admin.usersEditForm');
        Route::post('users-edit', 'usersUpdate')->name('admin.usersUpdate');

        Route::get('users-delete/{id}', 'userDelete')->name('admin.userDelete');
        // -------------------------USERS CRUD ROUTES END--------------------
    });   // USER CONTROLLER CLOSEUP

        /*
        |---------------------------------------------------------------------
        | MOOD TRACK CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */
        Route::controller(MoodTrackController::class)->group(function(){
            Route::get('moodtype','moodtype')->name('admin.moodTypeList');

            Route::get('moodtype-edit/{id}','moodTypeEditForm')->name('admin.moodTypeEditForm');
            Route::post('moodtype-edit','moodTypeUpdate')->name('admin.moodTypeUpdate');

            Route::get('moodtype-delete/{id}','moodTrackDelete')->name('admin.moodTrackDelete');

        }); // MOOD TRACK CONTROLLER CLOSEUP

    // -------------------------MOOD TRACK  CRUD ROUTES END--------------------


     /*
        |---------------------------------------------------------------------
        | JOURNALS POSTS CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */
    Route::controller(JournalController::class)->group(function(){
        Route::get('journal-posts-List','journalPosts')->name('admin.journalPostList');
        Route::get('journal-posts-view/{id}','journalPostView')->name('admin.journalPostView');

        Route::get('journal-posts-add','journalPostAddForm')->name('admin.journalPostAddForm');
        Route::post('journal-posts-add','journalPostStore')->name('admin.journalPostStore');

        Route::get('journal-posts-edit/{id}','journalPostEditForm')->name('admin.journalPostEditForm');
        Route::post('journal-posts-edit','journalPostUpdate')->name('admin.journalPostUpdate');

        Route::get('journal-posts-delete/{id}','journalPostDelete')->name('admin.journalPostDelete');

        // ----------------------JOURNALIST DAIRY ROUTES START------------------------------------
        Route::get('journalist','journalists')->name('admin.journalists');
        Route::get('journalist-view/{id}','journalistView')->name('admin.journalistView');

        Route::get('journalist-delete/{id}','journalistDelete')->name('admin.journalistDelete');

        // ----------------------JOURNALIST DAIRY ROUTES END--------------------------------------


    });  // JOURNALS CONTROLLER CLOSEUP

    // -------------------------JOURNALS POSTS ROUTES END--------------------


      /*
        |---------------------------------------------------------------------
        | COMMUNITY GROUPS CONTROLLER ROUTE
        |---------------------------------------------------------------------
        */

    Route::controller(CommunitySupportGrpController::class)->group(function(){

        Route::get('group-list','groupList')->name('admin.communityGroups');
        Route::get('group-view/{id}','groupView')->name('admin.communityGroupView');

        Route::get('group-add','groupAddForm')->name('admin.communityGroupAddForm');
        Route::post('group-add','groupStore')->name('admin.communityGroupStore');

        Route::get('group-edit/{id}','groupEditForm')->name('admin.communityGroupEditForm');
        Route::post('group-edit','groupUpdate')->name('admin.communityGroupUpdate');

        Route::get('group-delete/{id}','groupDelete')->name('admin.communityGroupDelete');

    });    // COMMUNITY GROUPS CONTROLLER CLOSEUP


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
