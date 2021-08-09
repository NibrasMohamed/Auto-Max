<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileMaster extends Model
{
    protected $table = 'file_master';

    protected $guarded=[];

    public $timestamps = false;

    public $primarykey='id';
}
