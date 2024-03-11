<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = ['name'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}