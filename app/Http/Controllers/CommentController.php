<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Publication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\newCommentMail;

class CommentController extends Controller
{
    public function store(Request $request){
        $validate = $request->validate([
            'comment' => ['required']
        ]);

        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'content' => $request->comment,
            'publication_id' => $request->post
        ]);

        $comment->save();

        $publication = Publication::find($request->post);
        Mail::to($publication->publishedBy->email)->send(new newCommentMail($comment->commentedTo->title, $comment->commentedBy->name, $comment->content));

        return back();
    }

    public function approveComment(Comment $comment){
        $comment->approve();
        return back();
    }
}
