<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // INDEX(HOME) PAGE VIEW FUNCTION
    public function index(){
        try{
            $data['data'] = url()->current();
            return view('frontend.home',$data);
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

     // ABOUT US PAGE VIEW FUNCTION
     public function aboutUs(){
        try{
            return view('frontend.aboutUs');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
     // BLOG PAGE VIEW FUNCTION
    public function blog(){
        try{
            return view('frontend.blog');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

     // CONTACT US PAGE VIEW FUNCTION
     public function contactUs(){
        try{
            return view('frontend.contactUs');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

     // FAQ PAGE VIEW FUNCTION
     public function fAQ(){
        try{
            return view('frontend.fAQ');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }


     // PRIVACY POLICY PAGE VIEW FUNCTION
     public function privacyPolicy(){
        try{
            return view('frontend.privacyPolicy');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }


     // TEARMS OS SERVICE PAGE VIEW FUNCTION
     public function tearmsOfService(){
        try{
            return view('frontend.termsOfService');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
// =============SERVICES FUNCTION START====================
     // SERVICES PAGE VIEW FUNCTION
     public function service(){
        try{
            return view('frontend.services.service');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

     // SERVICES (Meditation) PAGE VIEW FUNCTION
     public function meditation(){
        try{
            return view('frontend.services.meditation');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
    
     // SERVICES (Mood Tracking) PAGE VIEW FUNCTION
     public function moodTracking(){
        try{
            return view('frontend.services.moodTracking');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

     // SERVICES (Journaling) PAGE VIEW FUNCTION
     public function journaling(){
        try{
            return view('frontend.services.journaling');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    // SERVICES (Licensed Therapist Access) PAGE VIEW FUNCTION
    public function licensedTherapistAccess(){
        try{
            return view('frontend.services.licensedTherapistAccess');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    // SERVICES (Community Support) PAGE VIEW FUNCTION
    public function communitySupport(){
       try{
           return view('frontend.services.communitySupport');
       }catch(Exception $e){
           dd($e->getMessage());
       }
   }
    // SERVICES (Self-Care Tools) PAGE VIEW FUNCTION
    public function selfCareTools(){
        try{
            return view('frontend.services.selfCareTools');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
