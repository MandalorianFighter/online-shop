<?php

namespace App\Http\Livewire;

use App\Models\Admin\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ReportFilter extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $deleteId;
    public $paginate = 10;
    public $date = null;
    public $month = null;
    public $year = null;
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'sortAsc', 'sortField'];

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function confirmDelete()
    {
        $order = Order::findOrFail($this->deleteId);
        $order->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Order Is Deleted!')]);
    }

    public function sortBy($field)
    {
        if($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }

    private function applyFilters($query)
    {
        return $query->where('status',3)
        ->when($this->date, function ($query) {
            $query->whereDate('date', $this->date);
        })
        ->when($this->month, function ($query) {
            $query->whereMonth('date', $this->month);
        })
        ->when($this->year, function ($query) {
            $query->whereYear('date', $this->year);
        })->where(function ($query) {
            $query->where('payment_type', 'like', '%'.trim($this->search).'%')
                ->orWhere('balance_transaction', 'like', '%'.trim($this->search).'%')
                ->orWhere('subtotal', 'like', '%'.trim($this->search).'%')
                ->orWhere('shipping', 'like', '%'.trim($this->search).'%')
                ->orWhere('total', 'like', '%'.trim($this->search).'%')
                ->orWhere('date', 'like', '%'.trim($this->search).'%');
        });
    }


    public function render()
    {
        $monthes = [
            '01' => __('January'), 
            '02' => __('February'), 
            '03' => __('March'), 
            '04' => __('April'), 
            '05' => __('May'), 
            '06' => __('June'), 
            '07' => __('July'), 
            '08' => __('August'), 
            '09' => __('September'),
            '10' => __('October'),
            '11' => __('November'),
            '12' => __('December'),
        ];
        $years = [
            '2022' => '2022',
            '2023' => '2023',
            '2024' => '2024',
            '2025' => '2025',
            '2026' => '2026',
            '2027' => '2027',
            '2028' => '2028',
            '2029' => '2029',
            '2030' => '2030',
            '2031' => '2031',
            '2032' => '2032',
            '2033' => '2033',
        ];
        return view('livewire.report-filter', [
            'orders' => $this->applyFilters(Order::query())
            ->when($this->sortField, function($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate($this->paginate),
            'monthes' => $monthes,
            'years' => $years,
            'total' => $this->applyFilters(Order::query())->sum('total'),
        ]);
    }
}
