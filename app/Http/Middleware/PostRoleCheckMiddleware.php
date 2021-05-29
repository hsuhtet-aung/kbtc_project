<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRoleCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {  //check current user is admin or not
        //check current user is premium user or not
        // check this post is current user post ?
        $id = request('id');  //post id 
        $author_id = Post::find($id)->user_id;  //authorId in current post

        if(auth()->user()->isAdmin == "1" || auth()->user()->isPremium=="1" || auth()->user()->id == $author_id){
            return $next($request); //delete or update post
        }
        else{
            return redirect()->route('home')->with('errors',"Sorry,you are not both Premium User and Admin!");
        }
        
    }
}
