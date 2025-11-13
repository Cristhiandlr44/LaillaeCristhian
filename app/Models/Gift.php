<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'store_url',
        'is_purchased',
        'purchased_by',
        'purchased_at'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_purchased' => 'boolean',
        'purchased_at' => 'datetime'
    ];

    public function getFormattedPriceAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_purchased', false);
    }

    public function scopePurchased($query)
    {
        return $query->where('is_purchased', true);
    }
}
