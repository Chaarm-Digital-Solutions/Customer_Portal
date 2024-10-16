<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrganisationUser;

class Organisation extends Model
{
    use HasFactory;

    protected $connection = 'mysql_wcrm';
    protected $primaryKey = 'organisation_id';

    // Relationships
    
    /**
     * Get users the organisation has been assigned to 
     * 
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,            // The related model (from the local database)
            'organisation_user',    // The pivot table (in the local database)
            'organisation_id',      // Foreign key in the pivot table referencing the Organisation
            'user_id'               // Foreign key in the pivot table referencing the User
        )->using(OrganisationUser::class); // Custom pivot model to enforce local connection
    }

    /**
     * Get transactions assigned to the organisation 
     * 
     * @return HasMany
     */
    public function billing_transactions(): HasMany
    {
        return $this->hasMany(BillingTransaction::class);
    }

    /**
     * Get reads assigned to the organisation 
     * 
     * @return HasMany
     */
    public function reads(): HasMany
    {
        return $this->hasMany(Read::class);
    }
}