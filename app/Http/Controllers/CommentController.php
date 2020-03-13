<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;
class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();
        $this->validate($request ,[
            'comment' => 'required',
        ]);
        $challenge_id = $request->idc;
        $comment->challenge_id = $request->idc;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect('/challenges/'.$request->idc)->with('success', 'You comment was added succefully!');
    }
}
