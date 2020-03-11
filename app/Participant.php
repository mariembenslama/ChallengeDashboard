<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    public $primaryKey = 'id';
    public $integer = ['challenge_id', 'user_id'];
    public $boolean = ['submitted', 'winner'];
    public $string = 'code';
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];

    public function challenge() {
        return $this->hasMany('App\Challenge');
    }

    public function user() {
        return $this->hasMany('App\User');
    }
}
