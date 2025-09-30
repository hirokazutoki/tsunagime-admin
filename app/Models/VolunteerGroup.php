<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerGroup extends Model
{
    public function members()
    {
        return $this->belongsToMany(
            Volunteer::class,
            'volunteer_groups_volunteer',
            'volunteer_group_id',
            'volunteer_id'
        );
    }

    public function leader()
    {
        return $this->members()
            ->wherePivot('is_leader', 1);
    }

    public function subLeader()
    {
        return $this->members()
            ->wherePivot('is_subleader', 1);
    }

    public function otherMembers()
    {
        return $this->members()
            ->wherePivot('is_leader', 0)
            ->wherePivot('is_subleader', 0);
    }
}
