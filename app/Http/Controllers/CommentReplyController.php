<?php

namespace App\Http\Controllers;
use App\Models\CommentReply;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CommentReplyController extends Controller
{
    public function store(Request $request, $comment)
    {
        $this->validate($request,['message' => 'required|max:1000']);
        $commentReply = new CommentReply();
        $commentReply->comment_id = $comment;
        $commentReply->user_id = Auth::id();
        $commentReply->message = $request->message;
        $commentReply->save();
        //Success message
        Toastr::success('success','The comment replied Successfully :)');
        return redirect()->back();
    }
}
