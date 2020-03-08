<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    public $primaryKey = ['idChallenge', 'idGuest'];
    public $foreignKey = ['idChallenge', 'idGuest'];
    public $boolean = ['codeSubmitted', 'winner'];
    public $text = 'codeParticipant';
    public $timestamp = 'submittedAt';
}
