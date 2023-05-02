<?php

namespace App\Http\Livewire;

use App\Models\Admin\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $deleteId;
    public $paginate = 10;
    public $status = true;
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'status', 'sortAsc', 'sortField'];


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function confirmDelete()
    {
        Product::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Product Is Deleted!')]);
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
        $products = Product::select(['products.*', 'category_translations.category_name as category_name'])
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('category_translations', 'categories.id', '=', 'category_translations.category_id')->where('category_translations.locale', app()->getLocale())
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->search($this->search)
            ->where('status', $this->status)
            ->when($this->sortField, function($query) {
                $query->when($this->sortField == 'product_name', function ($query) {
                    $query->orderByTranslation($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->when($this->sortField == 'brand_name', function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->when($this->sortField == 'category_name', function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->when(!in_array($this->sortField, ['product_name', 'brand_name', 'category_name']), function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                });
            })->paginate($this->paginate);

        return view('livewire.product-table', [
            'products' => $products,
        ]);
    }
}


