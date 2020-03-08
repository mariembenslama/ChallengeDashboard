<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $foreignKey = ['idChallenge','idNonGuest'];
    public $primaryKey = ['idChallenge','idNonGuest'];
    public $string = 'comment';
    public $timestamp =['created_at', 'updated_at'];
}
