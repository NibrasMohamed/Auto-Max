<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\User;

class Project extends Model
{
    use Notifiable;
    protected $guarded=[];

   public $primarykey='id';

    public function user(){
       return $this->belongsTo('App\User');
    }

}
