<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'trip_name',
        'booked_seat',
    ];

    public function trip()
    {
        // Explicitly specify the foreign key and local key
        return $this->belongsTo(Trip::class, 'trip_name', 'id');
    }

}
