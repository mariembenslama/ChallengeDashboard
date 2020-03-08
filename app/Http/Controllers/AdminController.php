<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends OrganizerController
{

    /***** Organizers *****/

    public function index() {
        return "List of organizers";
    }
    public function SearchOrganizers() {
        return "Search Organizer";
    }
    public function DeleteOrganizer() {
        return "Delete organizer";
    }
    public function GetOrganizerById() {
        return "Organizer by Id";
    }

    

}
