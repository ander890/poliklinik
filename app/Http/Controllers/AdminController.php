<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginPage(Request $request){
        return view("auth.login");
    }

    public function login(Request $request){
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if($request->username == "admin" && $request->password == "admin"){
            $request->session()->put("login", true);
            $request->session()->put("nama", "Admin");
            $request->session()->put("role", "admin");
            toastr()->success("Login sukses");
            return redirect('/admin/dashboard');
        }else{
            toastr()->error("Login gagal, username atau password salah");
            return redirect()->back();
        }
    }

    public function dashboardPage(Request $request){
        return view("page.dashboard");
    }

    public function logout(Request $request){
        toastr()->success("Logout sukses");
        $request->session()->flush();
        return redirect('/admin/login');
    }
}
