<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class BillingTransaction extends Model
{
    use HasFactory;

    protected $connection = 'mysql_wcrm';
    protected $table = 'billing_transactions';

    // Relationships

    /**
     * Get organisation the transaction belongs to 
     * 
     * @return BelongsTo
     */
    public function organisation(): BelongsTo
    {
        return $this->belongsTo(Organisation::class, 'account_number', 'sfAccountNumber');
    }
}
