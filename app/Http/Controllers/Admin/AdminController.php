<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLoginForm()
    {
        return view('backend.home.admin.auth.login');
    }

    public function adminLogin(Request $request)
    {
       $admin = Admin::where('email', $request->email)->first();
       if(!$admin){
        return redirect()->back()->with('error', 'Email or Password not match');

       }else{
        return redirect('/admin/dashboard');
       }

    }

    public function adminDashboard()
    {
        return view('backend.home.admin.home.index');
    }

    public function adminLogout()
    {

        session()->flush();
        return redirect('/');
    }
}
