<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PageSeo;

class SeoSettings extends Component
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
        $seo = PageSeo::findOrFail($this->deleteId);
        $seo->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('SEO Settings Is Deleted!')]);
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
        return view('livewire.seo-settings', [
            'seopages' => PageSeo::when($this->sortField, function($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->where(function ($query) {
                $query->where('page_url', 'like', '%'.trim($this->search).'%')
                    ->orWhere('page_title', 'like', '%'.trim($this->search).'%')
                    ->orWhere('meta_author', 'like', '%'.trim($this->search).'%')
                    ->orWhere('meta_keywords', 'like', '%'.trim($this->search).'%')
                    ->orWhere('meta_description', 'like', '%'.trim($this->search).'%');
            })->paginate($this->paginate),
            ]);
    }
}
