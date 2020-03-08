<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends NonGuestController
{
    public function SubmitCodeByIdChallenge() {
        return "Submit code by Id challenge";
    }
    public function DeleteCodeByIdChallenge() {
        return "Delete code by Id challenge";
    }
    public function ModifyCodeByIdChallenge() {
        return "Modify code by id challenge";
    }
    public function GetCodeByIdChallenge() {
        return "Get code by id challenge";
    }


}
