<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Eloquent;

class Guest extends Eloquent implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'guests';
    public $primaryKey = 'id';
    public $fillable = ['name', 'email', 'password', 'remember_token'];
    public $string = ['name', 'email', 'password', 'remember_token'];
    public $timestamps = ['created_at', 'updated_at', 'deleted_at'];

    public function participant() {
        return $this->hasMany('App\Participant');
    }
}

