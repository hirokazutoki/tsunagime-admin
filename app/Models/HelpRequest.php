<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function clientAvailabilityDates(): HasManyThrough
    {
        return $this->hasManyThrough(
            ClientAvailabilityDate::class, // 取得したい最終モデル
            Client::class,                 // 中間モデル
            'id',                          // Clientテーブルの主キー
            'client_id',                   // ClientAvailabilityDatesの外部キー
            'client_id',                   // HelpRequestテーブルの外部キー
            'id'                           // Clientテーブルの主キー
        );
    }
}
