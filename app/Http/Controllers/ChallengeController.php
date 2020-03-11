<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\User;
use Auth;
use DB;
class ChallengeController extends Controller
{
    public function index() {
        $sql = "select c.id, c.title, c.deadline, c.status, 
                u.name, u.role 
                from challenges c, users u 
                where c.organizer_id = u.id order by c.created_at desc";
        $challenges = DB::select($sql);
        return view('pages.Challenge.challenges', compact('challenges'));
    }

    public function show($id) {
        $sql = "select c.id as idc, c.title, c.description, c.deadline, c.status, c.created_at, c.updated_at, u.name, u.id, u.role
                from challenges c, users u 
                where c.organizer_id = u.id order by c.created_at desc limit 1";
        $challenges = DB::select($sql);
        $sql = "select comment from comments where challenge_id = $id";
        $comments = DB::select($sql);
        return view('pages.Challenge.challengeDetails', compact('challenges', 'comments'));
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
        $challenge->organizer_id = Auth::user()->id;
        $challenge->save();

        return redirect('/challenges')->with('success', 'Challenge added succefully!');
    }

    public function edit($id) {
        $sql = "select c.id, c.title, c.description, c.deadline, c.status from challenges c where id = $id";
        $challenges = DB::select($sql);
        return view('pages.Challenge.editChallenge')->with('challenges', $challenges);
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

    public function destroy($id) {
        $challenge = Challenge::find($id);
        $challenge->delete();
        return redirect('/challenges')->with('success', 'Challenge deleted');
    }

}
