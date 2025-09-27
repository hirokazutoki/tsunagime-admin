<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HelpRequest extends Model
{
    protected $attributes = [
        'process_status' => 'pending',
        'geocode_status' => 'pending',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
