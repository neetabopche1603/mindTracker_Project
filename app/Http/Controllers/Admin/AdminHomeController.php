<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function dashboard()
    {
        try {
            return view('backend.dashboard');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
