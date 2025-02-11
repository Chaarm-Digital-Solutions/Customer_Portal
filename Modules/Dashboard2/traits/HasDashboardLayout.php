<?php

namespace Modules\Dashboard2\Traits;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Dashboard2\App\Models\DashboardLayout;

trait HasDashboardLayout
{
    function dashboardLayout() : HasOne {
        return $this->hasOne(DashboardLayout::class);
    }
}
