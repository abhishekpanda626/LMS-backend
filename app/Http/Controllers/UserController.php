<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function register(Request $req)
    {
        $user=new User;
        $user->name=$req->input('name');
        $user->contact_no=$req->input('contact_no');        
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));
        $user->file_path=$req->file('file_path')->store('user');
        $user->save();
        return $user;
    }


    function userlogin(Request $req)
    {   $validator=Validator::make($req->all(),[
        'email'=>'required|email',
        'password'=>'required',
    ]);
        $token=$user->createToken('Token')->accessToken;    
        $user=User::where('email',$req->email)->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return response([
                'error'=>["Email or password doesn't match"]
            ]);
        }
        return $user;
    }
    function showusers(Request $req)
    {
        $user= new User;
        return $user::all();   
    }
    function delete($id){
        $result= User::where('id',$id)->delete();
        if($result)
        {
            return ['result'=>"Student has been Removed."];
        }
    }
    function getUser($id)
    {
        return User::find($id);
    }
    function update($id, Request $req)
    {
        $user= User::find($id);
        if($req->input('name'))
        {
            $user->name=$req->input('name');
        }
        if($req->input('contact_no'))
        {
            $user->contact_no=$req->input('contact_no');
        }
        if($req->input('email'))
        {
            $user->email=$req->input('email');
        }
        if($req->input('password'))
        {
            $user->password=$req->input('password');
        }
       
        // if($req->file('image'))
        // {
        //     $user->file_path=$req->file('image')->store('user');
        // }
       
        $user->save();
        return $user;
    }
}
