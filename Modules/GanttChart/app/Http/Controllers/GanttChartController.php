<?php

namespace Modules\GanttChart\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class GanttChartController extends Controller
{
    public function view(): View
    {
        return view('gantt_chart');
    }
}