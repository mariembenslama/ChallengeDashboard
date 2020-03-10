<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Participant;
use Illuminate\Support\Facades\Auth;
use DB;
class GuestController extends Controller
{
    
    public function index() {

        $idG = Auth::user()->id;
        $participant = Participant::where('idG', $idG);
        $guestChallenges = $participant->challenges()->get();
        // $sql = "select idC from participants where idG = $idG";
        // $challenges = DB::select($sql);
        // $sql = "select * from challenges where idC in $challenges order by submittedAt";
        // $guestChallenges = DB::select($sql);

        return view('pages.Guest.myChallenges')->with('guestChallenges', $guestChallenges);
    }

    public function show($id) {
        
    }

    public function store(Request $request) {
        
    }


}
