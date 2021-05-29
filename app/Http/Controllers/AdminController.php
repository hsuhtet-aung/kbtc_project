<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view("admin.index");
    }
    function manage(){
        // $users = User::all();
        $users = User::paginate(6);
        return view("admin.manage-premium-users",["users"=> $users]);
    }
    function deleteUser($id){
        $user = User::find($id);
        $user->delete();
        // return back()->with('noti', "Deleted user successfully!");
        return redirect()->route('admin.manage')->with('noti',"Delected User Successfully!");
    }

    function updateUser($id){
        $user = User::find($id);
        return view('admin.editUser',['user'=>$user]);
    }

    function post_updateUser($id){
        $validation = request()->validate([
            "name" => "required",
            "email" => "required",
            "isAdmin" => "required",
            "isPremium" => "required",
        ]);
        if($validation){
            $name = request('name');
            $email = request('email');
            $isAdmin = request('isAdmin');
            $isPremium = request('isPremium');

            $user = User::find($id);
            $user->name = $name;
            $user->email = $email;
            $user->isAdmin = $isAdmin;
            $user->isPremium = $isPremium;
            $user->update();
            // return back()->with('noti',"Update User Successfully!");
            return redirect()->route('admin.manage')->with('noti',"Update User Successfully!");
        }
        else{
            return back()->withErrors($validation);
        }
       


    }
    function check(){
            // $messages = ContactMessage::all();
            $messages = ContactMessage::paginate(6);
        
            return view("admin.check-messages",['messages'=>$messages]);
  
        
    }
}
