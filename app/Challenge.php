<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';
    public $primaryKey ="idChallenge";

    public function Comment(){
        return $this->hasMany('Comment');
    }
}
