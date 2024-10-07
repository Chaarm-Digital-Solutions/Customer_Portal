<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisation extends Model
{
    use HasFactory;

    protected $connection = 'mysql_wcrm';
    protected $table = 'billing_transactions';

    // Relationships
    
    /**
     * Get users the organisation has been assigned to 
     * 
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
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