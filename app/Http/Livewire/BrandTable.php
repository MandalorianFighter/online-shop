<?php

namespace App\Http\Livewire;

use App\Models\Admin\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandTable extends Component
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
        $brand = Brand::findOrFail($this->deleteId);
        $brand->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Brand Is Deleted!')]);
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
        return view('livewire.brand-table', [
            'brands' => Brand::when($this->sortField, function($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->where('brand_name', 'like', '%'.trim($this->search).'%')
            ->paginate($this->paginate),
        ]);
    }
}
