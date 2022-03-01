<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post)
    {
        $this->validate($request,['comment' => 'required|max:1000']);
        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        //Success message
        Toastr::success('success','The comment created Successfully :)');
        return redirect()->back();
    }
}
