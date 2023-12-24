<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_name',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class, 'from', 'id');
    }

}
