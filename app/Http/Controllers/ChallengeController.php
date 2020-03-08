<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Comment;
use App\NonGuest;

class ChallengeController extends Controller
{
    public function index() {
        $challenges = Challenge::orderBy('createdAt', 'desc')->paginate(10);
        return view('pages.Challenge.challenges')->with('challenges', $challenges);
    }

    public function show($idChallenge) {
        $data = [
            $challenge = Challenge::find($idChallenge),
            $nonGuests = NonGuest::all()
        ];
        return view('pages.Challenge.challengeDetails', compact(['challenge', 'nonGuests']));
    }

    public function store(Request $request){
        $idChallenge = $request->idChallenge;
        $this->validate($request ,[
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required'
        ]);

        // Create a comment
        $comment = new Comment();
        $nonGuest = new NonGuest();

        $nonGuest->nameNonGuest = $request->input('name');
        $nonGuest->emailNonGuest = $request->input('email');

        // Save non guest
        $idNonGuest = $nonGuest->save();

        // // Save comment
        // $comment->idNonGuest = $idNonGuest;
        // $comment->idChallenge = $idChallenge;
        // $comment->comment = $request->input('comment');
        // //  save a commen
        // $comment->save();

         return redirect('/challenges')->with('success', 'Comment added succefully!');
    }

}
