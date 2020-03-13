<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\User;
use App\Comment;
use Auth;
use DB;
class ChallengeController extends Controller
{
    public function index() {
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        $challenges = new Challenge();
        $challenges = Challenge::orderBy('created_at', 'Desc')
                                      ->paginate(10);
        return view('pages.Challenge.challenges', compact('challenges', 'user'));
    }

    public function show($id) {
        $id_user = Auth::user()->id;
        $challenge = Challenge::find($id);
        $comments = Comment::where('challenge_id', $id)
                            ->orderBy('created_at', 'Desc')
                            ->paginate(10);
        $sql = "select p.user_id from participants p where p.user_id=$id_user and p.challenge_id = $id";
        $submit = DB::select($sql);
        return view('pages.Challenge.challengeDetails', compact('challenge', 'comments','submit'));
    }

    public function store(Request $request){
        $challenge = new Challenge();
        $this->validate($request ,[
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'deadline' => 'required'
        ]);
        
        $challenge->title = $request->title;
        $challenge->description = $request->description;
        $challenge->deadline = $request->deadline;
        $challenge->status = $request->status;
        $challenge->user_id = Auth::user()->id;
        $challenge->save();

        return redirect('/challenges')->with('success', 'Challenge added succefully!');
    }

    public function edit($id) {
        $challenge = Challenge::find($id);
        return view('pages.Challenge.editChallenge')->with('challenge', $challenge);
    }
    public function update(Request $request, $id) {

        $this->validate($request ,[
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'deadline' => 'required'
        ]);

        $challenge = Challenge::find($id);

        $challenge->title = $request->input('title');
        $challenge->description = $request->input('description');
        $challenge->status = $request->input('status');
        $challenge->deadline = $request->input('deadline');

        $challenge->save();
        return redirect('/challenges')->with('success', 'Challenge updated');
    }
    public function search(Request $request) {

        $challenges = Challenge::all();
        $id_user = Auth::user()->id;
        $user = User::find($id_user);

        if ($request->has('keyword')) {
            $challenges = $challenges->where('title' ,$request->keyword);
        }

        if ($request->has('status')) {
            $challenges = $challenges->where('status', $request->status);
        }

        if ($request->has('period')) {
            $challenges->where('deadline', $request->period);
        }

        return view('pages.Challenge.challenges', compact('challenges', 'user'));

    }

    public function destroy($id) {
        $challenge = Challenge::find($id);
        $challenge->delete();
        return redirect('/challenges')->with('success', 'Challenge deleted');
    }

}
