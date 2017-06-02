<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'projects';
    
    protected $fillable = [

        'project_recordid',
        'projectid',
        'description',
        'citycost',
        'noncitycost',
        'totalcost',
        'managingagency',
        'commitments',
        'createtime'
       
    ];
}
