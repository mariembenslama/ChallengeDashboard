<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $table = 'organizers';
    public $primaryKey = 'id';
    public $string = ['name', 'email'];
    public $timestamp =['created_at', 'updated_at'];

}
