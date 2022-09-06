<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    function adminreg(Request $req)
    {
        $admin=new Admin;
        $admin->name=$req->input('name');
        $admin->email=$req->input('email');
        $admin->password=Hash::make($req->input('password'));
        $admin->save();
        return $admin;
        
    }
    function adminlogin(Request $req)
    {
        $admin=Admin::where('email',$req->email)->first();
        if(!$admin || !Hash::check($req->password,$admin->password))
        {
            return response([
                'error'=>["Email or password doesn't match"]
            ]);
        }
        return $admin;
    }
}
