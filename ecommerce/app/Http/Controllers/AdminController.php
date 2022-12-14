<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;
use Session;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function show_dashboard(Request $request)
    {
        Session_start();
        $admin_email=$request->email;
        $admin_password=md5($request->password);
        $result=Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result)
        {
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return Redirect::to('/dashboard');
        }
        else
        {
            Session::put('message','Invalid email or password');
            return Redirect::to('/admins');
        }
    }
   
}
