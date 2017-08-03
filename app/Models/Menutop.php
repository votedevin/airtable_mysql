<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menutop extends Model
{
    protected $primaryKey = 'menu_top_id';

    protected $table = 'menu_top';
    
    protected $fillable = [

        'menu_top_label',
        'menu_top_link'       
    ];
}
