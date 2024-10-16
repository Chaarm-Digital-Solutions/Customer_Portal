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

    /**
     * Database to be used by this model
     * 
     * @var string
     */
    protected $connection = 'mysql_wcrm';

    /**
     * Table from the specified database to be used by this model
     * 
     * @var string
     */
    protected $table = 'organisations';


    /**
     * Primary key from the specified table to be used by this model
     * 
     * @var string
     */
    protected $primaryKey = 'organisation_id';

    // Relationships
    
    /**
     * Get users the organisation has been assigned to 
     * 
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        $database = config('database.connections.' . config('database.default') . '.database');
        return $this->belongsToMany(
            User::class,
            "$database.organisation_user",
            'organisation_id',
            'user_id'
        )->using(OrganisationUser::class);
    }

    /**
     * Get transactions assigned to the organisation 
     * 
     * @return HasMany
     */
    public function billing_transactions(): HasMany
    {
        return $this->hasMany(BillingTransaction::class, 'account_number', 'billingAccountReference');
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