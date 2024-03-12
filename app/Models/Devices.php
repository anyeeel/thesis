<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    protected $fillable = [
        'name',
        'type',
        'quantity',
        'brand',
        'model',
        'installed_date',
        'life_expectancy',
        'power',
        'hours_used'
    ];

    protected $appends = ['energy'];

    public function getEnergyAttribute()
    {
        return $this->power * $this->hours_used / 1000;
    }
}
