<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Participant;
use Route;
use DB;
class ParticipantController extends Controller
{
    public function index() {
        $id = Route::current()->parameter('id');
        return view('pages.Participant.submitCode')->with('id', $id);
    }

    public function store(Request $request, $id){
        $user_id = Auth::user()->id;
        $participant = new Participant();
        $this->validate($request ,[
            'code' => 'required',
        ]);
        
        $participant->code = $request->code;
        $participant->submitted = TRUE;
        $participant->user_id = Auth::user()->id;
        $participant->challenge_id = $id;
        $participant->save();

        return redirect('/challenges')->with('success', 'Code submitted successfully!');
    }
    public function show($id) {
        $sql = "select p.id, p.user_id, p.challenge_id, p.code, p.submitted,
                c.id, c.title 
                from participants p, challenges c  
                where p.challenge_id = $id and p.submitted = TRUE and c.id = p.challenge_id";
        $codes = DB::select($sql);

        $sql = "select id, title from challenges where id = $id";
        $challenge = DB::select($sql);

        return view('pages.Participant.checkCodes', compact('codes', 'challenge'));
    }
    public function update(Request $request, $id) {

        $this->validate($request ,[
            'winner' => 'required',
        ]);

        $participant = Participant::find($id);
        $participant->winner = TRUE;
        $participant->save();
        return redirect('/challenges')->with('success', 'You decided the winner for the challenge');

    }

}
