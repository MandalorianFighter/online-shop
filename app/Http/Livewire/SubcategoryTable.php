<?php

namespace App\Http\Livewire;

use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubcategoryTable extends Component
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
        $category = Category::findOrFail($this->deleteId);

        // Delete the translations associated with the category
        $category->translations()->delete();

        // Delete the category
        $category->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Subcategory Is Deleted!')]);
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
        $subcategories = Subcategory::select(['subcategories.*', 'category_translations.category_name as category_name'])
        ->join('categories', 'subcategories.category_id', '=', 'categories.id')
        ->join('category_translations', 'categories.id', '=', 'category_translations.category_id')->where('category_translations.locale', app()->getLocale())
        ->when($this->sortField, function($query) {
            $query->when($this->sortField == 'subcategory_name', function ($query) {
                $query->orderByTranslation('subcategory_name', $this->sortAsc ? 'asc' : 'desc');
            })
            ->when($this->sortField == 'category_name', function ($query) {
                $query->orderBy('category_name', $this->sortAsc ? 'asc' : 'desc');
            })
            ->when(!in_array($this->sortField, ['subcategory_name', 'category_name']), function ($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            });
        })
        ->search($this->search)
        ->paginate($this->paginate);
        
        $categories = Category::all()->pluck('category_name','id');

        return view('livewire.subcategory-table', [
            'subcategories' => $subcategories,
            'categories' => $categories,
        ]);
    }
}



