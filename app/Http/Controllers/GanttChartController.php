<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GanttChartController extends Controller
{
    public function view(): View
    {
        return view('gantt_chart');
    }
}
