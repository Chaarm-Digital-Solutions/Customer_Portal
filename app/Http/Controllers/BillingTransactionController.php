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
        $billsDataTable = new BillsDataTable;
        $dataTables = ['bills' => $billsDataTable->html()];

        return view('bills', [
            'dataTables' => $dataTables,
        ]);
    }

    /**
     * Display a listing of the payments
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function viewPayments(): View
    {
        $paymentsDataTable = new PaymentsDataTable;
        $dataTables = ['payments' => $paymentsDataTable->html()];

        return view('payments', [
            'dataTable' => $dataTables,
        ]);
    }
}
