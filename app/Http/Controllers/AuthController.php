<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    //login
    function login(){
        return view('auth.login');
    }
    
    function post_login(){
        // vaalidate input field from login form
        $validation=request()->validate([
            "email"=>"required",
            "password"=>"required",
        ]);
        if($validation){
            // auth success or not
            $auth=Auth::attempt([
                'email'=>request('email'),
                'password'=>request('password'),
                ]);
            if($auth){
                return redirect()->route('home');
            }
            else{
                return back()->with("error","Authentication Failed!Try again");
            }
            
        }
        else{
            return back()->withErrors($validation);
        }
    }

    //register
    function register(){
        return view('auth.register');
    }
    
    function post_register(){
       $validation = request()->validate([
        "username" => "required",
        "email" => "required",
        "password" => "required||min:8||confirmed",
        "image" => "required",
     ]);
        // dd($validation);
        
    if($validation){
        // save these data to database
        $image = request('image'); 

        // get image name from image file
        // move image file to public
        $image_name =uniqid()."_". $image->getClientOriginalName(); 
        $image->move(public_path('images/profiles'),$image_name);

        $password = $validation['password'];

        $user=new User();
        $user->name= $validation['username'];
        $user->email= $validation['email'];
        $user->password= Hash::make($password);  
        // change password to hashcode format
        $user->image = $image_name;
        $user->save();
        
        if(Auth::attempt([
            'email'=>request('email'),
            'password'=>request('password'),
            ])){
                return redirect()->route('home');
            }
       
        
        }
    else{
        return back()->withErrors($validation);
        }
    }
     //logout
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    function post_userProfile(){
        $name = request('name');
        $email = request('email');
        $image = request('image');
        $old_password = request('old_password');
        $new_password = request('new_password');
        // dd($name , $email , $image , $old_password , $new_password);

        // if user does not change profile image and password,
        // add the current username and email as default by id into database back
        $id=auth()->user()->id;
        $current_user = User::find($id);
        $current_user->name = $name;
        $current_user->email = $email;
        if($image){
        //  move file to public  path 
            $imageName = uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/profiles/'),$imageName);
            //save image name to database
            $current_user->image=$imageName;
            $current_user->update();
            return back()->with('message',"You change a new profile picture!");
        }
        if($old_password && $new_password){
            // if check user input old password and current user password in database must be the same
            if(Hash::check($old_password,$current_user->password)){
                // if same , let user to change new password
                $current_user->password = Hash::make($new_password);
                $current_user->update();
                return back()->with('message',"You change a new password!");
            }
            else{
                return back()->withErrors('error',"Your old password is incorrect!");
            }
            
        }
        $current_user->update();
        return back();


    }
    
}
