<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'floor_id',
        'name',
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}

