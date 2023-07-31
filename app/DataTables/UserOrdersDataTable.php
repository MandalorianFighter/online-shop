<?php

namespace App\DataTables;

use App\Models\Admin\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserOrdersDataTable extends DataTable
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
        ->editColumn('payment_id', function ($order) {
            return $order->payment_id ? $order->payment_id : '-';
        })
        ->editColumn('total', function ($row) {
            return '$ ' .$row->total;
        })
        ->editColumn('date', function ($row) {
            return $row->date->format('d-m-Y');
        })
        ->addColumn('status', function ($order) {
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
        ->addColumn('action', function ($order) {
            return '<a href="'.route('view.order', $order).'" class="btn btn-sm btn-info">'.__('View').'</a>';
        })
        ->rawColumns(['status', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Admin\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', auth()->id());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-orders-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(3, 'desc')
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
            Column::make('payment_type')->title(__('Payment Type'))
                ->orderable(true)
                ->searchable(true),
            Column::make('payment_id')->title(__('Payment ID'))
                ->orderable(true)
                ->searchable(true),
            Column::make('total')->title(__('Amount'))
                ->orderable(true)
                ->searchable(true),
            Column::make('date')->title(__('Date'))
                ->orderable(true)
                ->searchable(true),
            Column::make('status')->title(__('Status'))
                ->orderable(false)
                ->searchable(true),
            Column::make('status_code')->title(__('Status Code'))
                ->orderable(true)
                ->searchable(true),
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
        return 'UserOrders_' . date('YmdHis');
    }
}



