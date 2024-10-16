<?php

namespace App\Http\Controllers;

use App\DataTables\BillsDataTable;
use App\DataTables\PaymentsDataTable;
use Illuminate\Contracts\View\View;

class BillingTransactionController extends Controller
{
    /**
     * Display a listing of the bills
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function viewBills(): View
    {
        $dataTable = new BillsDataTable;

        return view('bills', [
            'dataTable' => $dataTable->html(),
        ]);
    }

    /**
     * Display a listing of the payments
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function viewPayments(): View
    {
        $dataTable = new PaymentsDataTable;

        return view('payments', [
            'dataTable' => $dataTable->html(),
        ]);
    }
}
