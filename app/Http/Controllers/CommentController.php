<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function store(Request $request){
        $comment = new Comment();
        $this->validate($request ,[
            'comment' => 'required',
        ]);
        $comment->save();

        return redirect('/challenges')->with('success', 'You comment was added succefully!');
    }
}
