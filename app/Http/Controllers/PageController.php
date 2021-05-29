<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index() {
        $posts= Post::latest()->paginate(6);
        // $posts=Post::all(); 1 to ...
        return view('index', ['posts'=>$posts]);

        // $user = User::find(1);
        // dd($user->posts->toArray());
        // $post = Post::find(2);
        // dd($post->user->name);
    }

    function createPost(){
        return view('user.create');
    }

    function showPostbyID($id){
        $post = Post::find($id);
        return view('user.showPost',compact('post'));
    }

    function editPost($id){
        $update_post = Post::find($id);
        return view('user.editPost',["update_post"=>$update_post]);
    }


    function userprofile(){
        return view('user.userprofile');
    }

    function contactUs(){
        return view('user.contactus');
    }
   
   
}
