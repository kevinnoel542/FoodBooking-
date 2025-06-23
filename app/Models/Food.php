<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    protected $table = 'foods';

    public function bookings()
    {
        return $this->belongsToMany(Booking::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
