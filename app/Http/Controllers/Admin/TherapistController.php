<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class TherapistController extends Controller
{
    /*
        |---------------------------------------------------------------------
        | THERAPIST CRUD FUNCTION START
        |---------------------------------------------------------------------
        */

    // Deletes(destroy) Therapist Function 
    public function therapistDestroy(Request $request)
    {
        try {
            // $ids = $request->ids;
            // User::whereIn('id', explode(",", $ids))->delete();
            // return response()->json(['success' => "Selected users deleted successfully."]);
            User::whereIn('id',$request->ids)->delete();
            return response()->json(["msg"=>"success"]);
            // return redirect()->route('admin.therapist')->with('delete', 'Delete Data Successfully');

        } catch (Exception $e) {
            // dd($e->getMessage());
            return response()->json(["msg"=>"faild"]);
        }
    }



    // Therapist Show List Function
    public function therapistList(Request $request)
    {
        try {
            if ($request->ajax()) {
                $therapist = User::where('role', 1)->get();
                return Datatables::of($therapist)
                    ->addColumn('status', function ($row) {
                        return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Block</span>';
                    })

                    ->addColumn('checkbox', function ($row) {
                        return '<div class="dt-checkbox">
                                    <input type="checkbox" id="example-select-all" class="sub_chk" data-id="'.$row->id.'">
                                    <span class="dt-checkbox-label"></span>
                                </div>';
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="' . route('admin.therapistViewForm', $row->id) . '" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="' . route('admin.therapistEditForm', $row->id) . '"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="' . route('admin.therapistDelete', $row->id) . '" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'status','checkbox'])
                    ->make(true);
            }
            return view('backend.therapist.therapistList.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Therapist show details form function
    public function therapistViewForm($id)
    {
        try {
            $therapistView = User::find($id);
            return view('backend.therapist.therapistList.view', compact('therapistView'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    // Therapist Add form function
    public function therapistAddForm()
    {
        try {
            return view('backend.therapist.therapistList.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Therapist Add form function
    public function therapistStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required| min:6| max:8 |confirmed',
            'password_confirmation' => 'required| min:6',
            'mobile_number' => 'required|min:11|numeric|unique:users,mobile_number',
            'gender' => 'required',
            'bio' => 'required',
            'ocupation' => 'required',
            'avatar' => 'mimes:jpeg,png,jpg,gif,svg', 'max:2048',
        ]);
        // dd($request->all());
        try {
            $therapistStore = new User();
            $therapistStore->name = strtoupper($request->name);
            $therapistStore->email = $request->email;
            $therapistStore->password = Hash::make($request->password);
            $therapistStore->role = 1;
            $therapistStore->gender = $request->gender;
            $therapistStore->bio = $request->bio;
            $therapistStore->ocupation = $request->ocupation;
            $therapistStore->mobile_number = $request->mobile_number;
            $therapistStore->address = $request->address;
            $therapistStore->status = $request->status;

            if ($reqAvatar = $request->file('avatar')) {
                $destinationPath = '/profilesImages/';
                $profileIMG = date('YmdHis') . "." . $reqAvatar->getClientOriginalExtension();
                $reqAvatar->move(public_path() . $destinationPath, $profileIMG);
                $imgFullPath = $destinationPath . $profileIMG;
                $therapistStore->avatar = url($imgFullPath);
            }
            $therapistStore->save();
            return redirect()->route('admin.therapist')->with('success', "Therapist Add Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // Therapist Edit form function
    public function therapistEditForm($id)
    {
        try {
            $therapistEdit = User::where('role', 1)->find($id);
            return view('backend.therapist.therapistList.edit', compact('therapistEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //    Therapist Update Function

    public function therapistUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'mobile_number' => 'required|min:11|numeric|unique:users,mobile_number,' . $request->id,
            'gender' => 'required',
            'bio' => 'required',
            'ocupation' => 'required',
            'avatar' => 'mimes:jpeg,png,jpg,gif,svg', 'max:2048',
        ]);
        try {
            $therapistUpdate =  User::find($request->id);
            $therapistUpdate->name = strtoupper($request->name);
            $therapistUpdate->email = $request->email;
            // check password
            if ($request->password != '') {
                $therapistUpdate->password = Hash::make($request->password);
            }

            $therapistUpdate->role = 1;
            $therapistUpdate->gender = $request->gender;
            $therapistUpdate->bio = $request->bio;
            $therapistUpdate->ocupation = $request->ocupation;
            $therapistUpdate->mobile_number = $request->mobile_number;
            $therapistUpdate->address = $request->address;
            $therapistUpdate->status = $request->status;

            if ($reqAvatar = $request->file('avatar')) {
                $destinationPath = '/profilesImages/';

                // Old Image Delete Code Start
                if ($therapistUpdate->avatar != NULL) {
                    if (file_exists('profilesImages/' . $therapistUpdate->avatar)) {
                        unlink('profilesImages/' . $therapistUpdate->avatar);
                    }
                }
                // Old Image Delete Code End

                $profileIMG = date('YmdHis') . "." . $reqAvatar->getClientOriginalExtension();
                $reqAvatar->move(public_path() . $destinationPath, $profileIMG);
                $imgFullPath = $destinationPath . $profileIMG;
                $therapistUpdate->avatar = url($imgFullPath);;
            }

            $therapistUpdate->update();
            return redirect()->route('admin.therapist')->with('success', "Therapist Update Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Delete Therapist Function 
    public function therapistDelete($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route('admin.therapist')->with('delete', "Therapist Delete Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }



    // -------------------------THERAPIST CRUD END-------------------------
}
