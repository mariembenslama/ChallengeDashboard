<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    public $primaryKey = 'idGuest';
    public $string = ['nameGuest', 'emailGuest'];
    public $timestamp =['created_at', 'updated_at'];

}
