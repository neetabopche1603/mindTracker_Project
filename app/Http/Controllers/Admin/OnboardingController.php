<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnboardingQue;
use Exception;
use Illuminate\Http\Request;
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
                        ->addColumn('status', function ($row) {
                           return $row->status==1?'<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Block</span>';
                            
                        })
                        ->addColumn('action', function($row){
         
                               $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="#" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="#"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="#"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';
        
                                return $btn;
                        })
                        ->rawColumns(['action','questions','status'])
                        ->make(true);
            }

            return view('backend.onboardingQuestions.index');
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
        try {
            $validated = $request->validate([
                'questions' => 'required|unique:onboarding_ques,questions',
                'options' => 'required',
            ]);

            $onboardingStore = new OnboardingQue();
            $onboardingStore->questions = $request->questions;
            $optsarr = [];
            foreach ($request['options'] as $index => $optionText) {
                array_push($optsarr,$optionText);
            }
            $onboardingStore->options = json_encode($optsarr,JSON_FORCE_OBJECT);
            $onboardingStore->save();
            return redirect()->route('admin.onboardingQueIndex')->with('success', "Question and option successfully add");
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

    public function onboardingQuesUpdate(Request $request)
    {
        $validated = $request->validate([
            'questions' => 'required|unique:onboarding_ques,questions,'.$request->id,
            'options' => 'required',
        ]);
        try {
            $onboardingStore = OnboardingQue::find($request->id);
            $onboardingStore->questions = $request->questions;
            $optsarr = [];
            foreach ($request['options'] as $optionText) {
                array_push($optsarr,$optionText);
            }
            $onboardingStore->options = json_encode($optsarr,JSON_FORCE_OBJECT);
            $onboardingStore->update();
            return redirect()->route('admin.onboardingQueIndex')->with('success', "Question and option successfully add");
       
          
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
