<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    public $primaryKey = 'id';
    public $foreignKey = ['idG', 'idC'];
    public $boolean = ['codeSubmitted', 'winner'];
    public $text = 'codeParticipant';
    public $timestamp = 'submittedAt';

    public function challenges() {
        return $this->hasMany('App\Challenge');
    }
    public function guests() {
        return $this->hasMany('App\guest');
    }

}
