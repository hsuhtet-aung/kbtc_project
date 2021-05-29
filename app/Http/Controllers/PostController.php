<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{   
    //delete
        function deletePost($id){
            //    get delete data by user id
                $delete_post = Post::find($id);
            //    dd($delete_user);
            //delete that data
                $delete_post->delete();
            // return back
            return redirect()->route('home')->with('message',"Your Post is deleted successfully!");
            }


    //update
        function updatePost($id){
            // get input data from edit form 
            $title=request('title');
            $image = request('image');
            $content = request('content');
            // update these data into database
                // require update id***
            $update_data = Post::find($id);
            $update_data->title = $title;
            $update_data->content = $content;
            //image
            if($image){
                $imageName = uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path('images/posts/'),$imageName);
                $update_data->image = $imageName;
            }
            
            $update_data->update();
    
            // return back
            // return redirect(home)->with("message","Your post is updated successfully!");
            return redirect()->route('home')->with("message","Your post is updated successfully!");
        }


    //create
        function createpost(){
        
            $validation = request()->validate([
                "title" => "required",
                "image"  => "required",
                "content"  => "required",
            ]);
            if($validation){
                // save data into database
                $title = request('title');
                $image = request('image'); //file
                $content = request('content');
                $posts = new Post();
                $posts->user_id = auth()->user()->id;
                $posts->title = $title;
                //  image
                $imageName = uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path('images/posts/'),$imageName);
                $posts->image = $imageName;
    
                $posts->content = $content;
                $posts->save();
                return redirect()->route('home')->with("noti","You created a new post.");
            }
            else{
                return back()->withErrors($validation);
            }
            
        }
}
