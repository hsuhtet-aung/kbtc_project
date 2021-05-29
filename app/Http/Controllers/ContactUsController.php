<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function post_contact_message(){
        $validation = request()->validate([
            "username" => "required",
            "email" => "required",
            "message" => "required",
        ]);
        if($validation){
            $username = request('username');
            $email = request('email');
            $text = request('message');
            
            $message = new ContactMessage();
            $message->username = $username;
            $message->email = $email;
            $message->messages = $text;
            $message->save();
        }
        else{
            return back()->withErrors($validation);
        }
      
        return back()->with("message","Message Sent!");
    }

    //delete Message

    function deleteMessage($id){
        // find this data by id in database
        $delete_message = ContactMessage::find($id);

        // delete this data 
        $delete_message->delete();

        // return back
        return back()->with('noti',"Deleted message succcessfully!");

    }

    //update Message 
    function updateMessage($id){
        $update_message = ContactMessage::find($id);
       return view('admin.updatemessage',["update_message"=>$update_message]);
    }

    //post update message

    function post_updateMessage($id){

        $validation = request()->validate([
            "username" => "required",
            "email" => "required",
            "message" => "required",
        ]);

        if($validation){
            $username = request('username');
            $email = request('email');
            $messages = request('message');

            $update_message = ContactMessage::find($id);
            $update_message->username = $username;
            $update_message->email = $email;
            $update_message->messages = $messages;

            $update_message->update();
            return back()->with('noti',"Updated Successfully");
        }
        else{
            return back()->withErrors($validation);
        }
        


        
    }
}
