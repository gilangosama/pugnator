<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'phone',
        'payment_method',
        'event_id',
        'user_id',
        'status'
    ];

    // Tambahkan relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Tambahkan relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
