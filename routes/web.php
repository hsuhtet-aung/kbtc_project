<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

        //user
        Route::get('/',[PageController::class,"index"])->name('home');
        //post
        Route::get('/user/createPost',[PageController::class,"createPost"])->name("createPost");
        Route::get('/posts/{id}',[PageController::class,"showPostbyID"])->name('showPostbyID');
        Route::get('/posts/edit/{id}',[PageController::class,"editPost"])->name('editPost');
        Route::get('/user/userProfile',[PageController::class,"userProfile"])->name("userProfile");

        Route::get('/user/contactUs',[PageController::class,"contactUs"])->name("contactUs");
        Route::post('/user/contactUs',[ContactUsController::class ,"post_contact_message"])->name("post_contact_message");


        //backend code
        Route::get('/posts/delete/{id}',[PostController::class,"deletePost"])->name('deletePost')->middleware('premiumUser');
        Route::post('/posts/update/{id}',[PostController::class,"updatePost"])->name('updatePost')->middleware('premiumUser');
        Route::post('/user/createPost',[PostController::class,"createpost"])->name("post");

        
        Route::post('/user/userProfile',[AuthController::class,"post_userProfile"])->name("post_userProfile");

        Route::get('/logout',[AuthController::class,"logout"])->name('logout');

        //admin
Route::middleware("admin")->group(function(){
        Route::get('/Admin/index',[AdminController::class,"index"])->name("admin.home");
        Route::get('/Admin/manage',[AdminController::class,"manage"])->name("admin.manage");
        Route::get('/Admin/manage/delete/{id}',[AdminController::class,"deleteUser"])->name("deleteUser");
        Route::get('/Admin/manage/update/{id}',[AdminController::class,"updateUser"])->name("updateUser");
        Route::post('/Admin/manage/update/{id}',[AdminController::class,"post_updateUser"])->name("post_updateUser");



        Route::get('/Admin/check',[AdminController::class,"check"])->name("admin.check");
        Route::get('/Admin/contact_message/delete/{id}',[ContactUsController::class,"deleteMessage"])->name('deleteMessage');
        Route::get('/Admin/contact_message/update/{id}',[ContactUsController::class,"updateMessage"])->name('updateMessage');
        Route::post('/Admin/contact_message/postUpdate/{id}',[ContactUsController::class,"post_updateMessage"])->name('post_updateMessage');
});
        
        
        

});

Route::middleware('guest')->group(function(){
    //authentication
        Route::get('/login',[AuthController::class,"login"])->name('login');
        Route::post('/post_login',[AuthController::class,"post_login"])->name("post_login");
        Route::get('/register',[AuthController::class,"register"])->name("register");
        Route::post('/post_register',[AuthController::class,"post_register"])->name("post_register");
});




