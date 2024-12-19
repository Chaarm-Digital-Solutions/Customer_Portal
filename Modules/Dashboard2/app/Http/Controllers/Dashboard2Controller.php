<?php

namespace Modules\Dashboard2\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Dashboard2Controller extends Controller
{
    public function index()
    {
        return view('dashboard2::index');
    }

    public function saveLayout(Request $request)
    {
        $layout = $request->input('layout');
        // Save layout to database or file
        return response()->json(['success' => true]);
    }
}