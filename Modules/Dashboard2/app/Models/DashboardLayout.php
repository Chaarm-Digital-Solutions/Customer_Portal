<?php

namespace Modules\Dashboard2\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DashboardLayout extends Model
{
    function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
