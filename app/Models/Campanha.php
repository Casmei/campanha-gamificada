<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    protected $fillable = [
        'name',
        'description',
        'active',
        'start_date',
        'end_date',
        'owner_id',
    ];
}
