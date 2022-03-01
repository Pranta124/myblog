<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comment;
use App\Models\CommentReply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class ComController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }
    public function destroy($id)
    {

        $comment = Comment::findOrFail($id);
        //Delete all replies
        $replies = CommentReply::where('comment_id',$id)->delete();
        $comment->delete();
        Toastr::success('Comment Successfully deleted :)');
        return redirect()->back();
    }
}
