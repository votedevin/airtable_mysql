<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menumain extends Model
{
    protected $primaryKey = 'menu_main_id';

    protected $table = 'menu_main';
    
    protected $fillable = [

        'menu_main_label',
        'menu_main_link'       
    ];
}
