<?php

namespace App\Http\Controllers\User;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
class ComntController extends Controller
{
    public function index()
    {
        $comments = Comment::where('user_id',Auth::id())->latest()->get();
        return view('user.comments.index', compact('comments'));
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        //Delete replies
        $replies = CommentReply::where('comment_id',$id)->delete();
        if($comment->user_id == Auth::id())
        {
            $comment->delete();
            Toastr::success('Comment Successfully deleted :)');
            return redirect()->back();
        }
        else
        {
            Toastr::error('You can not delete this comment :(');
            return redirect()->back();
        }
     
    }
}
