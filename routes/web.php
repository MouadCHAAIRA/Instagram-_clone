<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
                    
Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function(){
//Profiles
Route::get('feed',[FeedController::class,'index'])->name('feed');
Route::get('edit',[ProfileController::class,'create'])->name('edit');
Route::post('store',[ProfileController::class,'store'])->name('store');
Route::get('index',[ProfileController::class,'index_profile'])->name('index');
Route::get('edit_Profile',[ProfileController::class,'editProfile'])->name('edit_Profile');
Route::put('update_Profile/{id}',[ProfileController::class,'updateProfile'])->name('update_Profile');
Route::get('profileUser/{id}',[ProfileController::class,'find_profile_user'])->name('profileUser');
Route::post('storeFollow',[ProfileController::class,'storeFollow'])->name('storeFollow');
Route::delete('deleteFollow/{id}',[ProfileController::class,'destroyFollow'])->name('deleteFollow');


//posts
Route::get('create_Post',[PostController::class,'createPost'])->name('create_Post');
Route::post('storePost',[PostController::class,'storePost'])->name('storePost');
Route::get('details_Post/{id}',[PostController::class,'detailsPost'])->name('details_Post');
Route::delete('delete/{id}',[PostController::class,'destroyPost'])->name('delete');
//comments
Route::post('storeComment',[CommentController::class,'storeComment'])->name('storeComment');
Route::get('indexComment',[CommentController::class,'indexComment'])->name('indexComment');

//likes
Route::post('storeLike',[LikeController::class,'storeLike'])->name('storeLike');
Route::delete('deleteLike/{id}',[LikeController::class,'destroyLike'])->name('deleteLike');


});

Auth::routes();


