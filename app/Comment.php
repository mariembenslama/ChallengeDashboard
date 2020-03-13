<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $primaryKey = 'id';
    public $string = 'comment';
    public $integer = ['challenge_id', 'user_id'];
    public $timestamp = ['created_at', 'updated_at'];

    public function challenge() {
        return $this->belongsTo('App\Challenge', 'challenge_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
