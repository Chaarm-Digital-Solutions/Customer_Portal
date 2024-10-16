<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrganisationUser extends Pivot
{
    protected $connection = 'mysql'; // Ensure pivot table uses the local connection

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function organisation():HasOne
    {
        return $this->hasOne(Organisation::class, 'organisation_id', 'organisation_id');
    }
}
