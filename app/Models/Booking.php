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
        return $this->belongsTo(Trip::class, 'trip_id'); // Make sure to replace 'trip_id' with the actual foreign key column name.
    }

}
