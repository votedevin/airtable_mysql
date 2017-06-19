<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menuedit extends Model
{
    protected $primaryKey = 'menu_id';

    protected $table = 'menu';
    
    protected $fillable = [

        'menu_label',
        'menu_link'       
    ];
}
