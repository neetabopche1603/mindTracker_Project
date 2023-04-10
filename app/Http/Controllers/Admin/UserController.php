<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /*
        |---------------------------------------------------------------------
        | USERS CRUD FUNCTION START
        |---------------------------------------------------------------------
        */
    // USERS Show List Function
    public function usersList(Request $request)
    {
        try {
            if ($request->ajax()) {
                $users = User::where('role', 0)->get();
                return Datatables::of($users)
                    ->addColumn('status', function ($row) {
                        return $row->status == 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Block</span>';
                    })
                    ->addColumn('action', function ($row) {

                        $btn = '<div class="dropdown">
                               <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                   <i class="dw dw-more"></i>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                   <a class="dropdown-item" href="'.route('admin.userstViewForm',$row->id).'" class="text-warning"><i class="dw dw-eye text-warning"></i> View</a>

                                   <a class="dropdown-item" href="'.route('admin.usersEditForm',$row->id).'"><i class="dw dw-edit2 text-success"></i> Edit</a>

                                   <a class="dropdown-item" href="'.route('admin.userDelete',$row->id).'" onclick="return confirm(`Are you sure delete this data`)"><i class="dw dw-delete-3 text-danger"></i> Delete</a>
                               </div>
                           </div>';

                        return $btn;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            }
            return view('backend.users.userList.index');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // USERS show details form function
    public function userstViewForm($id)
    {
        try {
            $userstViewForm = User::find($id);
            return view('backend.users.userList.view', compact('userstViewForm'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    // USERS Add form function
    public function usersAddForm()
    {
        try {
            return view('backend.users.userList.add');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // USERS Add form function
    public function usersStore(Request $request)
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
            $therapistStore->role = 0;
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
            return redirect()->route('admin.usersList')->with('success', "Users Add Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // USERS Edit form function
    public function usersEditForm($id)
    {
        try {
            $usersEdit = User::where('role', 0)->find($id);
            return view('backend.users.userList.edit', compact('usersEdit'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    //    USERS Update Function

    public function usersUpdate(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            // 'password' => 'min:6| max:8 |confirmed',
            // 'password_confirmation' => 'min:6',
            'mobile_number' => 'required|min:11|numeric|unique:users,mobile_number,'.$request->id,
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

            $therapistUpdate->role = 0;
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
                $therapistUpdate->avatar =  url($imgFullPath);;
            }

            $therapistUpdate->update();
            return redirect()->route('admin.usersList')->with('success', "Users Update Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    // Delete USERS Function 
    public function userDelete($id)
    {
        try {
            User::find($id)->delete();
            return redirect()->route('admin.usersList')->with('delete', "Users Delete Successfully Done.!");
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // -------------------------THERAPIST CRUD END-------------------------
}
