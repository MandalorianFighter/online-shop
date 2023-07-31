<?php

namespace App\DataTables;

use App\Models\Admin\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderReturnDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
        ->eloquent($query)
        ->addColumn('return_order', function (Order $order) {
            // Logic to display the return_order status
            if ($order->return_order == 0) {
                return '<span class="badge rounded-pill text-bg-warning">'.__('No Request').'</span>';
            } elseif ($order->return_order == 1) {
                return '<span class="badge rounded-pill text-bg-primary">'.__('Pending').'</span>';
            } elseif ($order->return_order == 2) {
                return '<span class="badge rounded-pill text-bg-success">'.__('Success').'</span>';
            }
        })
        ->editColumn('total', function ($row) {
            return '$ ' .$row->total;
        })
        ->editColumn('date', function ($row) {
            return $row->date->format('d-m-Y');
        })
        ->addColumn('status', function (Order $order) {
            // Logic to display the status
            if ($order->status == 0) {
                return '<span class="badge rounded-pill text-bg-warning">'.__('Pending').'</span>';
            } elseif ($order->status == 1) {
                return '<span class="badge rounded-pill text-bg-primary">'.__('Payment Accepted').'</span>';
            } elseif ($order->status == 2) {
                return '<span class="badge rounded-pill text-bg-warning">'.__('Progress').'</span>';
            } elseif ($order->status == 3) {
                return '<span class="badge rounded-pill text-bg-success">'.__('Delivered').'</span>';
            } else {
                return '<span class="badge rounded-pill text-bg-danger">'.__('Canceled').'</span>';
            }
        })
        ->addColumn('action', function (Order $order) {
            // Logic to display the action buttons
            if ($order->return_order == 0) {
                return '<a href="#" class="btn btn-sm btn-warning return-order" id="'. $order->id .'" data-bs-toggle="modal" data-bs-target="#returnOrderModal">'.__('Return').'</a>';
            } else {
                return '<a href="#" class="btn btn-sm btn-secondary return-order disabled">'.__('Return').'</a>';
            }
        })
        ->rawColumns(['return_order', 'status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', auth()->id())
        ->where('status', 3);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('order-return-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(3,'desc')
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('payment_type')->title(__('Payment Type')),
            Column::computed('return_order')->title(__('Return')),
            Column::make('total')->title(__('Amount')),
            Column::make('date')->title(__('Date')),
            Column::computed('status')->title(__('Status')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title(__('Action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'OrderReturn_' . date('YmdHis');
    }
}
