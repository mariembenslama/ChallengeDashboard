<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    public $idGuest = 'idGuest';
    public $nameGuest = 'nameGuest';
    public $emailGuest = 'emailGuest';
    public $passwordGuest = 'passwordGuest';
}
