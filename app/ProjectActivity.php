<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectActivity extends Model
{

    protected $table = 'project_activity';

    protected $guarded=[];

    public $timestamps = true;

    public $primarykey='id';

    public function user(){
       return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }

    public function files()
    {
        return $this->hasMany('\App\FileMaster', 'folder_id', 'id')
            ->where('file_master.category', '=', 'project-activuty')
            ->select('file_master.*');
    }

}
