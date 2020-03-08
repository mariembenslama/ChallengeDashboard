<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonGuest extends Model
{
    protected $table = 'non_guests';
    public $primaryKey = 'idNonGuest';
    public $timestamp =['created_at', 'updated_at'];
}
