<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Challenge;

class Comment extends Model
{
    protected $table = 'comments';
    public $primaryKey = 'idComment';
    public $string = ['comment','emailNonGuest', 'nameNonGuest'];
    public $timestamp =['created_at', 'updated_at'];

    public function challenge(){
        return $this->belongsTo('Challenge');
    }
}
