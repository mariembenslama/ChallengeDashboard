<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $table = 'organizers';
    public $primaryKey = 'idOrganizer';
    public $string = ['nameOrganizer', 'emailOrganizer'];
    public $timestamp =['createdAt', 'updatedAt'];

}
