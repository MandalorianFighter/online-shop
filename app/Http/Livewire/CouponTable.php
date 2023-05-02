<?php

namespace App\Http\Livewire;

use App\Models\Admin\Coupon;
use Livewire\Component;
use Livewire\WithPagination;

class CouponTable extends Component
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
        $coupon = Coupon::findOrFail($this->deleteId);
        $coupon->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Coupon Is Deleted!')]);
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
        return view('livewire.coupon-table', [
            'coupons' => Coupon::when($this->sortField, function($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->where(function ($query) {
                $query->where('coupon', 'like', '%'.trim($this->search).'%')
                    ->orWhere('discount', 'like', '%'.trim($this->search).'%');
            })
            ->paginate($this->paginate),
        ]);
    }
}
