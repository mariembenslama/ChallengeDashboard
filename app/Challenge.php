<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use Comment;
use App\User;
class Challenge extends Eloquent
{
    protected $table = 'challenges';
    public $primaryKey ='id';
    public $string = ['title', 'description'];
    public $date = 'deadline';
    public $boolean = 'status'; // Ongoing, Closed
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];

    public function user() {
         return $this->belongsTo('App\User', 'user_id');
    }
    public function comment() {
        return $this->hasMany(Comment::class,'challenge_id');
    }
    public function users() {
        return $this->belongsToMany(User::class, 'participants');
    }
}
