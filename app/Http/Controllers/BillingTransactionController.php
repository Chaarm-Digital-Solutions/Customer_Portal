<?php

namespace App\Http\Controllers;

use App\DataTables\BillsDataTable;
use App\DataTables\PaymentsDataTable;
use Illuminate\Http\Request;

class BillingTransactionController extends Controller
{
    /**
     * Display a listing of the bills
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function viewBills(Request $request)
    {
        $billsDataTable = new BillsDataTable;
        $dataTables = ['bills' => $billsDataTable->html()];

        if ($request->ajax()) {
            if ($request->dataTable === 'bills') {
                return $billsDataTable->render('bills');
            }
        }

        return view('bills', [
            'dataTables' => $dataTables,
        ]);
    }

    /**
     * Display a listing of the payments
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function viewPayments(Request $request)
    {
        $paymentsDataTable = new PaymentsDataTable;
        $dataTables = ['payments' => $paymentsDataTable->html()];

        if ($request->ajax()) {
            if ($request->dataTable === 'payments') {
                return $paymentsDataTable->render('bills');
            }
        }

        return view('payments', [
            'dataTables' => $dataTables,
        ]);
    }
}
