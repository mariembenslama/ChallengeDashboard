<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Comment;
use Auth;
use DB;
class ChallengeController extends Controller
{
    public function index() {
        // $challenges = Challenge::orderBy('created_at', 'desc')->paginate(10);
        $sql = "select o.name, c.title, c.description, c.id, c.deadline, c.status 
        from challenges c, organizers o order by c.created_at desc";
        $challenges = DB::select($sql);
        return view('pages.Challenge.challenges')->with('challenges', $challenges);
    }

    public function show($id) {
        $challenge = Challenge::find($id);
        $organizer = Challenge::where('organizer_id', $challenge->organizer_id)->limit(1);
        return view('pages.Challenge.challengeDetails', compact('challenge', 'organizer'));
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
