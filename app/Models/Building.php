<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'building_name',
        'num_of_floors',
        // Add other fillable attributes as needed
    ];

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }
}