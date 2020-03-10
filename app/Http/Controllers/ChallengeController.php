<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Comment;
use Auth;
class ChallengeController extends Controller
{
    public function index() {
        $challenges = Challenge::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.Challenge.challenges')->with('challenges', $challenges);
    }

    public function show($id) {
        $data = [
            $challenge = Challenge::find($id),
            $comments = Comment::where('id', $id)
                        ->get()
                        ->sortByDesc('created_at')
        ];
        return view('pages.Challenge.challengeDetails', compact(['challenge', 'comments']));
    }

 

    public function store(Request $request){
        $challenge = new Challenge();
        $this->validate($request ,[
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required'
        ]);
        
        $challenge->title = $request->title;
        $challenge->description = $request->description;
        $challenge->deadline = $request->deadline;
        $challenge->idO = Auth::user()->id;
        $challenge->save();

        return redirect('/organizerchallenges')->with('success', 'Challenge added succefully!');
    }

}
