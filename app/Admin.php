<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    public $idAdmin = 'idAdmin';
    public $nameAdmin = 'nameAdmin';
    public $emailAdmin = 'emailAdmin';
    public $passwordAdmin = 'passwordAdmin';
}
