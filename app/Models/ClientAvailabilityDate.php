<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientAvailabilityDate extends Model
{
    public function scopeToday($query)
    {
        $query->where('availability_date', today()->toDateString());
    }
}
