<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Organizer;
use App\Challenge;

class AdminController extends OrganizerController
{

    public function fetchGuests() {
        $guests = Guest::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.Admin.listGuests')->with('guests', $guests);
    }
    public function fetchOrganizers() {
        $organizers = Organizer::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.Admin.listOrganizers')->with('organizers', $organizers);
    }

    public function showGuest($idGuest) {
        $guest = Guest::find($idGuest);
        return view('pages.Admin.guestDetails')->with('guest', $guest);
    }

    public function showOrganizer($idOrganizer) {
        $organizer = Organizer::find($idOrganizer);
        $organizerChallenges = Challenge::where('idOrganizer', $idOrganizer)
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        return view('pages.Admin.organizerDetails', compact('organizer', 'organizerChallenges')); 
    }
    
    public function store(Request $request) {
        
    }


}
