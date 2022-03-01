<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ComController;
use App\Http\Controllers\User\ComntController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentReplyController;
use App\Http\Controllers\Admin\ComReplyController;
use App\Http\Controllers\User\ComntReplyController;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPost;
use App\Models\Post;
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

//  Route::get('/', function () {
//     return view('welcome');
//  });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home'); 
// All post
 Route::get('/posts', [HomeController::class, 'posts'])->name('posts'); 
// single post
 Route::get('/post/{slug}', [HomeController::class, 'post'])->name('post');
 //Categories
 Route::get('/categories', [HomeController::class, 'categories'])->name('categories'); 
 Route::get('/categories/{slug}', [HomeController::class, 'categoryPost'])->name('category.post');
  //search
  Route::get('/search', [HomeController::class, 'search'])->name('search');
    //tag post
    Route::get('/tag/{name}', [HomeController::class, 'tagPosts'])->name('tag.posts');
    //Comment post
    Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment.store')->middleware('auth');
    //Comment reply
    Route::post('/comment-reply/{comment}', [CommentReplyController::class, 'store'])->name('reply.store')->middleware('auth');
        //Liked post
        Route::post('/like-post/{post}', [HomeController::class, 'likePost'])->name('post.like')->middleware('auth');
//ADmin/////////////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'admin', 'as' => 'admin.' , 'middleware' => ['auth','admin']],function(){

    Route::get('/index',[indexController::class,'index'],'IndexController@index')->name('index');
    Route::get('/profile',[indexController::class,'showProfile'],'IndexController@showProfile')->name('profile');
    Route::put('/profile',[indexController::class,'updateProfile'],'IndexController@updateProfile')->name('profile.update');
    Route::put('/profile/password',[indexController::class,'changePassword'],'IndexController@changePassword')->name('profile.password');
    Route::resource('users','App\Http\Controllers\Admin\UserController')->except([
    'create', 'show', 'edit','store']);
   Route::resource('category','App\Http\Controllers\Admin\CategoryController')->except([
    'create', 'show', 'edit']);
    Route::resource('post','App\Http\Controllers\Admin\PostController');
    Route::get('/comments', [ComController::class, 'index'])->name('comment.index');
    Route::delete('/comment/{id}', [ComController::class, 'destroy'])->name('comment.destroy');
    Route::get('/reply-comments', [ComReplyController::class, 'index'])->name('reply-comment.index');
    Route::delete('/reply-comment/{id}', [ComReplyController::class, 'destroy'])->name('reply-comment.destroy');
    Route::get('/post-liked-users/{post}', [PostController::class, 'likedUsers'])->name('post.like.users');
    
});
//USER////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'user', 'as' => 'user.' ,'namespace' => 'User', 'middleware' => ['auth','user']],function(){

    Route::get('/index',[UserController::class,'index'],'UserController@index')->name('index');
    Route::get('/comments',[ComntController::class,'index'])->name('comment.index');
    Route::delete('/comment/{id}',[ComntController::class,'destroy'])->name('comment.destroy');
    Route::get('/reply-comments', [ComntReplyController::class, 'index'])->name('reply-comment.index');
    Route::delete('/reply-comment/{id}', [ComntReplyController::class, 'destroy'])->name('reply-comment.destroy');
    Route::get('/user-liked-posts', [UserController::class, 'likedPosts'])->name('like.posts');
}); 
//view composer
View::composer('layouts.frontend.partials.sidebar',function($view)
{
    $categories = Category::all()->take(5);
    $recentTags = Tag::all()->take(5);
    $recentPosts = Post::latest()->take(3)->get(3);
    return $view->with('categories',$categories)->with('recentPosts',$recentPosts)->with('recentTags',$recentTags);
});
//Send Mail
Route::get('/send',function(){
    $post = Post::findOrFail(13);
    //Send Mail
    Mail::to('prantaroy1997@gmail.com')
    ->bcc(['user12@gmail.com','pranta123@gmail.com'])
    ->queue(new NewPost($post));
    return (new NewPost($post))->render();
});