<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Comment;

class ChallengeController extends Controller
{
    public function index() {
        $challenges = Challenge::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.Challenge.challenges')->with('challenges', $challenges);
    }

    public function show($idChallenge) {
        $data = [
            $challenge = Challenge::find($idChallenge),
            $comments = Comment::where('idChallenge', $idChallenge)
                        ->get()
                        ->sortByDesc('created_at')
        ];
        return view('pages.Challenge.challengeDetails', compact(['challenge', 'comments']));
    }

 

    public function store(Request $request){
        $challenge = new Challenge();
        $challenge->idChallenge = $request->idChallenge;
        $this->validate($request ,[
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required'
        ]);

        // Create a comment
        $comment = new Comment();

        $comment->nameNonGuest = $request->input('name');
        $comment->emailNonGuest = $request->input('email');
        $comment->comment = $request->input('comment');
        $comment->idChallenge = $challenge->idChallenge;
        // $challenge = Challenge::find(1);
        // $comment->challenge()->attach($challenge);

        // Save a comment
        $comment->save();

        return redirect('/challenges')->with('success', 'Comment added succefully!');
    }

}
