<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Challenge;
class Participant extends Model
{
    protected $table = 'participants';
    public $primaryKey = 'id';
    public $boolean = ['submitted', 'winner'];
    public $string = 'code';
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];

    public function challenge() {
        return $this->hasMany(Challenge::class, 'challenge_id');
    }

    public function user() {
        return $this->hasMany(User::class, 'id');
    }
}
