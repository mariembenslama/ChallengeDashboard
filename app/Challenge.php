<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';
    public $primaryKey ='id';
    public $string = ['title', 'description'];
    public $date = 'deadline';
    public $boolean = 'status'; // Ongoing, Closed
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];

    public function participant() {
        return $this->belongsTo('App\Participant');
    }
    public function user() {
         return $this->belongsTo('App\User', 'user_id');
    }
    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
