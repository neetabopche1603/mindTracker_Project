<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  App\Services\AdminAuthService;

class AdminAuthController extends Controller
{
    // protected $AdminAuthService;

    // public function __construct(AdminAuthService $adminAuthService)
    // {
    //     $this->AdminAuthService = $adminAuthService;
    // }

    // ADMIN LOGIN VIEW FUNCTION
    public function adminLoginView()
    {
        try {
            return view('auth.admin.login');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    // ADMIN LOGIN FUNCTION
    public function adminLogin(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $check = Admin::where('email', $request->email)->first();
            if ($check && Hash::check($request->password, $check->password)) {
                session()->put('adminUser_name', $check->email);
                return redirect()->route('admin.dashboard')->with('success', 'Admin Login successfully Done.');
            } else {
                return redirect()->route('admin.loginGet')->with('error', 'Invalid credentials');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
