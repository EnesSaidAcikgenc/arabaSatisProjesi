<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';

    protected $fillable = ['user_id'
        ,'model_id'
        ,'damage_id'
        ,'year'
        ,'km'
        ,'color'
        ,'guarentee_status'
        ,'vites_turu'
        ,'fuel_turu'
        ,'posting_date'
        ,'status'
        ,'fiyat'
        ,'description'
    ];
}
