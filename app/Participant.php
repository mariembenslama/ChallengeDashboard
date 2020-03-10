<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    public $primaryKey = 'idP';
    public $boolean = ['codeSubmitted', 'winner'];
    public $string = 'codeParticipant';
    public $timestamp = 'submitted_at';
    public $integer = ['guest_id', 'challenge_id'];

}
