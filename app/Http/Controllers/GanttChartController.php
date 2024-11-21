<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class GanttChartController extends Controller
{
    public function view(): View
    {
        return view('gantt_chart');
    }
}
