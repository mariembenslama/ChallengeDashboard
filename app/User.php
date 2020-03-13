<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Eloquent;
use App\Challenge;
class User extends Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    protected $table = 'users';
    public $primaryKey = 'id';
    public $string = ['name', 'email', 'password', 'remember_token', 'role'];
    public $fillable = ['name', 'email', 'password'];
    public $hidden = ['remember_token', 'password'];
    public $timestamp = ['created_at', 'updated_at', 'deleted_at'];

    public function challenge() {
        return $this->hasMany(Challenge::class,'user_id');
    }

    public function challenges() {
        return $this->belongsToMany(Challenge::class, 'participants');
    }

}
