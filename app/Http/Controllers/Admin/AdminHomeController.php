<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Rules\AdminOldPasswordChange;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminHomeController extends Controller
{
    public function dashboard()
    {
        try {
            $admin = DB::table('admins')->first();
            return view('backend.dashboard',compact('admin'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // ADMIN PROFILE PAGE FUNCTION

    public function adminProfilePage(){
        try{
            $admin = DB::table('admins')->first();
            return view('backend.adminprofiles.profiles',compact('admin'));

        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // ADMIN PROFILE UPDATE Function
    public function adminprofileUpdate(Request $request){
        $validatedData = $request->validate(
            [
                'avatar' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
            ],
            [
                'avatar' => 'Please Choose Only jpg,jpeg,png,gif file.',
            ]
        );
        try{
            $adminUpdate = Admin::find($request->id);
            $adminUpdate->name = $request->name;
            $adminUpdate->email = $request->email;
            $adminUpdate->number = $request->number;
            $adminUpdate->address = $request->address;

            if ($request->file('avatar')) {
                // Old Image Delete Code Start
                if ($adminUpdate->image != NULL) {
                    if (file_exists('profilesImages/' . $adminUpdate->image)) {
                        unlink('profilesImages/' . $adminUpdate->image);
                    }
                }
                // Old Image Delete Code End
                $image = $request->file('avatar');
                $destinationPath = '/profilesImages/';
                $uploadImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $uploadImage);
                $ImageFullPath = $destinationPath .$uploadImage;
                $adminUpdate->avatar =  url($ImageFullPath);
            }
            $adminUpdate->update();
            return redirect()->back()->with('success', 'Profile Updated Successfully......!');

        }catch (Exception $e) {
            dd($e->getMessage());
        }
    }


     // =============Admin Change Passwords Function ==================
     public function adminChangePassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6|max:8',
        ]
        );
        $admins = Admin::where('email',$request->email)->first();
        if (!Hash::check($request->current_password, $admins->password)) {
            return redirect()->back()->with('success','The current password is incorrect.');
        }

        $admins->password = Hash::make($request->password);
        $admins->save();
        return redirect()->back()->with('password', 'Password Successfully Changed......!');
    }
}
