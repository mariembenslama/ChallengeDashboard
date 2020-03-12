<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\User;
use Auth;
use \Illuminate\Pagination\Paginator;
use DB;
class ChallengeController extends Controller
{
    public function index() {
        $id_user = Auth::user()->id;
        $sql = "select c.id, c.title, c.deadline, c.status, 
                u.name  
                from challenges c, users u 
                where c.organizer_id = u.id order by c.created_at desc";
        $challenges = DB::select($sql);
        $sql = "select u.role from users u where id =$id_user";
        $user = DB::select($sql);
        return view('pages.Challenge.challenges', compact('challenges', 'user'));
    }

    public function show($id) {
        $id_user = Auth::user()->id;
        $sql = "select c.id as idc, c.title, c.description, c.deadline, c.organizer_id, c.status, c.created_at, c.updated_at, 
                u.name, u.id, u.role
                from challenges c, users u 
                where c.organizer_id = u.id and c.id = $id order by c.created_at desc limit 1";
        $challenges = DB::select($sql);
        $sql = "select comment from comments where challenge_id = $id";
        $comments = DB::select($sql);
        $sql = "select p.user_id from participants p where p.user_id=$id_user and p.challenge_id = $id";
        $submit = DB::select($sql);
        return view('pages.Challenge.challengeDetails', compact('challenges', 'comments','submit'));
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
