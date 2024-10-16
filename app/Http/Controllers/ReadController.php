<?php

namespace App\Http\Controllers;

use App\DataTables\BillsDataTable;
use Illuminate\Contracts\View\View;

class ReadController extends Controller
{
    public function view(): View
    {
        $dataTable = new BillsDataTable;

        return view('reads', [
            'dataTable' => $dataTable->html(),
        ]);
    }
}
