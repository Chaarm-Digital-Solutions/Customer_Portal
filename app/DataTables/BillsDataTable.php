<?php

namespace App\DataTables;

use App\Models\BillingTransaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BillsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'bills.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BillingTransaction $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('transaction_type', 'bill');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('bills-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('account_number')->title('Billing Reference'),
            Column::make('reference')->title('Invoice number'),
            Column::make('bill_period_from')->title('Period start'),
            Column::make('bill_period_to')->title('Period end'),
            Column::make('invoice_date')->title('Invoice date'),
            Column::make('net')->title('Net'),
            Column::make('vat')->title('VAT'),
            Column::make('gross')->title('Gross'),
            Column::make('due_date')->title('Due by'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Bills_' . date('YmdHis');
    }
}
