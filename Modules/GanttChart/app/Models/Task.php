<?php

namespace Modules\GanttChart\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $guarded = [];

    // function project() : BelongsTo {
    //     return $this->belongsTo();
    // }
}
