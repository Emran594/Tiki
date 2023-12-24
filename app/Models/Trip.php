<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'from',
        'to',
        'seats',
        'status',
    ];

    protected $table = 'trips';


    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from', 'id');
    }
    
    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to', 'id');
    }

}
