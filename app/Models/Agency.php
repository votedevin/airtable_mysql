<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'agencies';
    
    protected $fillable = [
        'agency_recordid',
        'magency',
        'magencyname',
        'magencyacro',
        'projects',
        'commitments',
        'total_project_cost',
        'commitments_cost',
        'commitments_noncity_cost',
        'createtime'
       
    ];
}
