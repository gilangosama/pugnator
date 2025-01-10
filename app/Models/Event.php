<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'no_whatsapp',
        'description',
        'date',
        'deadline',
        'location',
        'image',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'id_event', 'id');
    }
}
