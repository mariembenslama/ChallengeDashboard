<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';
    public $primaryKey ="id";
    public $string = ['title', 'description'];
    public $date = 'deadline';
    public $boolean = 'status';
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];
    public $integer = 'idO';
    // public function participant() {
    //     return $this->belongsTo('App\Participant');
    // }
    // public function organizer() {
    //     return $this->belongsTo('App\Organizer');
    // }

}
