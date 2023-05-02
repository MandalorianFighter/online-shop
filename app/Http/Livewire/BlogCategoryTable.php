<?php

namespace App\Http\Livewire;

use App\Models\Admin\BlogCategory;
use Livewire\Component;
use Livewire\WithPagination;

class BlogCategoryTable extends Component
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
        $category = BlogCategory::findOrFail($this->deleteId);

        // Delete the translations associated with the category
        $category->translations()->delete();

        // Delete the category
        $category->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Category Is Deleted!')]);
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
        return view('livewire.blog-category-table', [
            'categories' => BlogCategory::when($this->sortField, function($query) {
                if($this->sortField == 'category_name') {
                    $query->orderByTranslation($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                } else {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                }
            })->whereTranslationLike('category_name', '%'.trim($this->search).'%')
            ->paginate($this->paginate),
        ]);
    }
}
