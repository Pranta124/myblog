<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 
/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $posts = Post::latest()->take(6)->Published()->get();
        return view('index',compact('posts'));
    }
    public function posts()
    {
       $posts = Post::latest()->Published()->paginate(10);
      
        return view('posts',compact('posts'));
    }
    public function post($slug)
    {
       $post = Post::where('slug',$slug)->Published()->first();
       $categories = Category::take(10)->get();
       $posts = Post::latest()->take(3)->Published()->get();
       //Increase View Count
       $postKey = 'post_'.$post->id;
       if(!Session::has($postKey))
       {
           $post->increment('view_count');
           Session::put($postKey, 1);
       }
        return view('post',compact('post','categories','posts'));
    }
    public function categories()
    {
       $categories = Category::all();
        return view('categories',compact('categories'));
    }
    public function categoryPost($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $posts = $category->posts()->published()->paginate(10);
        
        return view('categoryPost',compact('posts'));
    }
    public function search(Request $request)
    {
        $this->validate($request,['search' => 'required|max:255']);
        $search = $request->search;
        $posts = Post::where('tittle', 'like', "%$search%")->paginate(5);
        $posts->appends(['search' => $search]);
        // $categories = Category::all();
        return view('search',compact('posts','search'));
    }
    public function tagPosts($name)
    {
        $query = $name;
        $tags = Tag::where('name','like',"%$name%")->paginate(10);
        $tags->appends(['search' => $name]);
        return view('tagPosts',compact('tags','query'));
    }
    public function likePost($post)
    {
        //check if user already liked the post or not
        $user = Auth::user();
        $likePost = $user->likedPosts()->where('post_id',$post)->count();
        if($likePost == 0)
        {
            $user->likedPosts()->attach($post); //check if user like the post than attach the data
        }
        else
        {
            $user->likedPosts()->detach($post);
        }
        return redirect()->back();
    }

}
