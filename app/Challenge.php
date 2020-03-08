<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';
    public $primaryKey ="idChallenge";
    public $string = ['titleChallenge', 'descriptionChallenge'];
    public $date = 'deadlineChallenge';
    public $boolean = 'statusChallenge';
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];
}
