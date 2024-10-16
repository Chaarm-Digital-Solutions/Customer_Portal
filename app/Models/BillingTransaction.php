<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class BillingTransaction extends Model
{
    use HasFactory;

    // Connection
    
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
    protected $table = 'billing_transactions';

    /**
     * Primary key from the specified table to be used by this model
     * 
     * @var string
     */
    protected $primaryKey = 'transaction_id';

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
