<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'address',
        'city',
        'state',
        'postal_code',
        'latitude',
        'longitude',
        'phone',
        'website',
        'image_url',
        'event_time',
        'event_date'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'event_time' => 'datetime:H:i',
        'event_date' => 'date'
    ];

    public function getFullAddressAttribute()
    {
        return "{$this->address}, {$this->city} - {$this->state}, {$this->postal_code}";
    }

    public function getFormattedTimeAttribute()
    {
        return $this->event_time->format('H:i');
    }

    public function getFormattedDateAttribute()
    {
        return $this->event_date->format('d/m/Y');
    }

    public function scopeCeremony($query)
    {
        return $query->where('type', 'ceremony');
    }

    public function scopeReception($query)
    {
        return $query->where('type', 'reception');
    }
}
