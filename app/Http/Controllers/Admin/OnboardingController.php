<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnboardingQue;
use App\Models\UserOnboardingQuesAns;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
class OnboardingController extends Controller
{
    // Onboarding View Table function
    public function onboardingQueIndex(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = OnboardingQue::all();
                return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('questions', function ($row) {
                            return strip_tags($row->questions);
                        })
                        // ->addColumn('status', function ($row) {
                        //    return $row->status==1?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Block</span>';
                        // })
                        ->addColumn('action', function($row){
         
                               $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="'.route('admin.onboardingQuesViewFrom', $row->id).'" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="'.route('admin.onboardingQuesEditFrom', $row->id).'"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="'.route('admin.onboardingQuesDelete',$row->id) .'" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';
        
                                return $btn;
                        })
                        ->rawColumns(['action','questions'])
                        ->make(true);
            }

            return view('backend.onboardingQuestions.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


// View Onbording Question function
public function onboardingQuesViewFrom($id)
{
    try {
        $onboardingViewData = OnboardingQue::find($id);
        return view('backend.onboardingQuestions.view',compact('onboardingViewData'));
    } catch (Exception $e) {
        dd($e->getMessage());
    }
}
    // Add Onbording Question Options function
    public function onboardingQuesAddFrom()
    {
        try {
            return view('backend.onboardingQuestions.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //  Onboarding Question Options Store Function
    public function onboardingQuesStore(Request $request)
    {
        $validated = $request->validate([
            'questions' => 'required|unique:onboarding_ques,questions',
            'options' => 'required',
            'status' => 'required',
        ]);
        try {
            $onboardingStore = new OnboardingQue();
            $onboardingStore->questions = $request->questions;
            $optsarr = [];
            foreach ($request['options'] as $index => $optionText) {
                array_push($optsarr,$optionText);
            }
            $onboardingStore->options = json_encode($optsarr,JSON_FORCE_OBJECT);

            $onboardingStore->status = $request->status;
            $onboardingStore->save();
            return redirect()->route('admin.onboardingQueIndex')->with('success', "Onboarding Question and option successfully add");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Edit Onbording Question function
    public function onboardingQuesEditFrom($id)
    {
        try {
            $onboardingData = OnboardingQue::find($id);
            return view('backend.onboardingQuestions.edit',compact('onboardingData'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

       // Update Onbording Question function
    public function onboardingQuesUpdate(Request $request)
    {
        $validated = $request->validate([
            'questions' => 'required|unique:onboarding_ques,questions,'.$request->id,
            'options' => 'required',
            'status' => 'required',
        ]);
        try {
            $onboardingUpdate = OnboardingQue::find($request->id);
            $onboardingUpdate->questions = $request->questions;
            $optsarr = [];
            foreach ($request['options'] as $optionText) {
                array_push($optsarr,$optionText);
            }
            $onboardingUpdate->options = json_encode($optsarr,JSON_FORCE_OBJECT);
            $onboardingUpdate->status = $request->status;
            $onboardingUpdate->update();
            return redirect()->route('admin.onboardingQueIndex')->with('success', "Onboarding Question and option successfully add");
       
          
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Delete Onboarding Question Function

    public function onboardingQuesDelete($id){
        try{
            OnboardingQue::find($id)->delete();
            return redirect()->route('admin.onboardingQueIndex')->with('delete', "Onboarding Question and option successfully Deleted");
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }

     //Multiple Selection Delete Onboarding Question Function

     public function onboardingQuesDeletesData($id){
        try{
            OnboardingQue::find($id)->delete();
            return redirect()->route('admin.onboardingQueIndex')->with('delete', "Onboarding Question and option successfully Deleted");
        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }


 /*
        |---------------------------------------------------------------------
        | USER ONBOARDING QUESTION ANS FUNCTION START
        |---------------------------------------------------------------------
        */
        // Show Question Ans List Show Function
        
        public function showUserOnboardQuesAnsList(Request $request){
            try {
                if ($request->ajax()) {
                    $data = DB::table('user_onboarding_ques_ans')->join('users','users.id','=','user_onboarding_ques_ans.user_id')->select('user_onboarding_ques_ans.*','users.id as userId','users.name as user_name')->get();
                    return Datatables::of($data)
                          
                            ->addColumn('ques_ans', function ($row) {
                                // return strip_tags($row->questions);
                                 return json_encode($row->ques_ans);
                            })
                            ->addColumn('action', function($row){
             
                                   $btn = '<div class="dropdown">
                                   <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                       <i class="dw dw-more"></i>
                                   </a>
                                   <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                       <a class="dropdown-item" href="'.route('admin.userOnboardQuesAnsView', $row->id).'" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>
    
                                       <a class="dropdown-item" href="'.route('admin.userOnboardQuesAnsDelete',$row->id) .'" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                                   </div>
                               </div>';
            
                                    return $btn;
                            })
                            ->rawColumns(['action','ques_ans'])
                            ->make(true);
                }
    
                return view('backend.users.showOnbordQuesAnsList.index');
            } catch (Exception $e) {
                dd($e->getMessage());
            }
        }

        // View Onboarding Ques Ans
        public function userOnboardQuesAnsView($id){
            try{
                $userOnboardQuesAnsView = DB::table('user_onboarding_ques_ans')->join('users','users.id','=','user_onboarding_ques_ans.user_id')->select('user_onboarding_ques_ans.*','users.id as userId','users.name as user_name')->get();
                return view('backend.users.showOnbordQuesAnsList.view',compact('userOnboardQuesAnsView'));
            }catch (Exception $e) {
                dd($e->getMessage());
            }
        }

        // View Onboarding Ques Ans
        public function userOnboardQuesAnsDelete($id){
            try{
                UserOnboardingQuesAns::find($id)->delete();
               return redirect()->route('admin.showUserOnboardQuesAnsList')->with('delete','Question Deleted Successfully Done.!');
            }catch (Exception $e) {
                dd($e->getMessage());
            }
        }
}
