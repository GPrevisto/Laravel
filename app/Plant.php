<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $fillable = [
        'name',
        'scientific_name',
        'description',
        'isCarnivora'
    ];
   // protected $guarded = ['id', 'created_at', 'update_at'];
   // protected $table = 'plants';
}
