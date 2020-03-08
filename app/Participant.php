<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    public $idChallenge = 'idChallenge';
    public $idGuest = 'idGuest';
    public $codeSubmitted = 'codeSubmitted';
    public $codeParticipant = 'codeParticipant';
    public $winner = 'winner';
}
