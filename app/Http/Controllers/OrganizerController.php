<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organizer;
use App\Challenge;
use DB;

class OrganizerController extends Controller
{

    public function index() {
        $organizers = Organizer::orderBy('createdAt', 'desc')->paginate(10);
        return view('pages.Admin.listOrganizers')->with('organizers', $organizers);
    }

    public function show($idOrganizer) {
        $organizer = Organizer::find($idOrganizer);
        $organizerChallenges = Challenge::where('idOrganizer', $idOrganizer)
                               ->orderBy('createdAt', 'desc')
                               ->paginate(10);
                            
        return view('pages.Admin.organizerDetails', compact('organizer', 'organizerChallenges'));
    }

    public function store(Request $request) {

    }

}
