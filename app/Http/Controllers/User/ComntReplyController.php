<?php

namespace App\Http\Controllers\User;
use App\Models\CommentReply;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
class ComntReplyController extends Controller
{
    public function index()
    {
        
        $reply_comments = CommentReply::where('user_id',Auth::id())->get();
        return view('user.reply-comments.index', compact('reply_comments'));
    }
   
    public function destroy($id)
    {
        
        $reply_comment = CommentReply::findOrFail($id);
        if($reply_comment->user_id == Auth::id()) //those person check authinticated
        {
            $reply_comment->delete();
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
