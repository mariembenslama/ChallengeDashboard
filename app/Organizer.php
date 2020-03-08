<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    protected $table = 'organizers';
    public $idOrganizer = 'idOrganizer';
    public $nameOrganizer = 'nameOrganizer';
    public $emailOrganizer = 'emailOrganizer';
    public $passwordOrganizer = 'passwordOrganizer';
}
