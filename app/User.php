<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Eloquent;
class User extends Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'users';
    public $primaryKey = 'id';
    public $string = ['name', 'email', 'password', 'remember_token', 'role'];
    public $fillable = ['name', 'email', 'password'];
    public $boolean = 'status';
    public $integer = 'auth';
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];

    public function participant() {
        return $this->belongsTo('App\Participant');
    }

    public function challenge() {
        return $this->hasMany('App\Challenge');
    }
}
