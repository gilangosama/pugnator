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
        'status'
    ];

    // Definisikan konstanta untuk status
    const STATUS_UPCOMING = 'upcoming';
    const STATUS_COMPLETED = 'completed';

    // Daftar status yang valid
    public static $statuses = [
        self::STATUS_UPCOMING => 'Upcoming',
        self::STATUS_COMPLETED => 'Completed'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'event_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->orderBy('created_at', 'desc');
    }
}
