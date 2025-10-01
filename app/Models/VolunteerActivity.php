<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class VolunteerActivity extends Model
{
    public function client(): HasOneThrough
    {
        return $this->hasOneThrough(
            Client::class, // 最終的に取りたいモデル
            HelpRequest::class,    // 中間モデル
            'id',           // 中間モデル(User)のローカルキー
            'id',           // 最終モデル(Company)のローカルキー
            'help_request_id',      // Postモデルの外部キー
            'client_id'    // Userモデルの外部キー
        );
    }


    /**
     * @return BelongsTo
     */
    public function volunteerGroup(): BelongsTo
    {
        return $this->BelongsTo(VolunteerGroup::class);
    }

    /**
     * @return HasMany
     */
    public function shuttleDrivers(): HasManyThrough
    {
        return $this->hasManyThrough(
            Volunteer::class,
            ShuttleDriver::class,
            'volunteer_id',
            'id',
        );
    }

    /**
     * @return HasMany
     */
    public function truckDrivers(): HasManyThrough
    {
        return $this->hasManyThrough(
            Volunteer::class,
            TruckDriver::class,
            'volunteer_id',
            'id',
        );
    }

    /**
     * @return BelongsTo
     */
    public function centerStaff(): BelongsTo
    {
        return $this->BelongsTo(CenterStaff::class);
    }
}
