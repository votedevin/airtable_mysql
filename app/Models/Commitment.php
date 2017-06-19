<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commitment extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'commitments';
    
    protected $fillable = [

        'commitment_recordid',
        'budgetline',
        'fmsnumber',
        'managingagency',
        'projectid',
        'description',
        'commitmentcode',
        'commitmentdescription',
        'citycost',
        'noncitycost',
        'plancommdate',
        'createtime'
    ];
}
