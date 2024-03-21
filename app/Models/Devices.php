<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'type',
        'quantity',
        'brand',
        'model',
        'installed_date',
        'life_expectancy',
        'power',
        'hours_used',
        'energy', // Adding 'energy' attribute to the $fillable array
    ];

    protected $appends = ['energy'];

    protected $hidden = ['energy'];

    public function getEnergyAttribute()
    {
        return $this->power * $this->hours_used / 1000;
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
