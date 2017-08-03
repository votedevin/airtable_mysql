<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menuleft extends Model
{
    protected $primaryKey = 'menu_left_id';

    protected $table = 'menu_left';
    
    protected $fillable = [

        'menu_left_label',
        'menu_left_link'       
    ];
}
