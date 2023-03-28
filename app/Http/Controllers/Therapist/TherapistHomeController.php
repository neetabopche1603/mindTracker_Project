<?php

namespace App\Http\Controllers\Therapist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class TherapistHomeController extends Controller
{   
    // THERAPIST DASHBOARD VIEW FUNCTION
    public function dashboard(){
        try{
            return view('therapistPanels.dashboard');
        }catch(Exception $e){
            dd($e->getMessage());
        }
       
    }
}
