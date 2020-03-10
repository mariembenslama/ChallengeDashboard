<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
    public $id = 'id';
    public $name = 'name';
    public $email = 'email';
    public $password = 'password';
}
