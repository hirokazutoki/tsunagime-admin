<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'volunteers';

    public function getFullNameAttribute()
    {
        return "{$this->family_name} {$this->given_name}";
    }
}
