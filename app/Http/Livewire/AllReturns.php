<?php

namespace App\Http\Livewire;

use App\Models\Admin\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AllReturns extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $deleteId;
    public $paginate = 10;
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

    public function render()
    {
        return view('livewire.all-returns', [
            'orders' => Order::where('return_order',2)
            ->when($this->sortField, function($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->where(function ($query) {
                $query->where('payment_type', 'like', '%'.trim($this->search).'%')
                    ->orWhere('balance_transaction', 'like', '%'.trim($this->search).'%')
                    ->orWhere('subtotal', 'like', '%'.trim($this->search).'%')
                    ->orWhere('shipping', 'like', '%'.trim($this->search).'%')
                    ->orWhere('total', 'like', '%'.trim($this->search).'%')
                    ->orWhere('date', 'like', '%'.trim($this->search).'%');
            })->paginate($this->paginate),
        ]);
    }
}
