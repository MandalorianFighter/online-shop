<?php

namespace App\Http\Livewire;

use App\Models\Admin\Newsletter;
use Livewire\Component;
use Livewire\WithPagination;

class NewsletterTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $deleteId;
    public $paginate = 10;
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'sortAsc', 'sortField'];

    public $selected = [];
    public $selectAll = false;



    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function confirmDelete()
    {
        Newsletter::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Subscriber Is Deleted!')]);
    }
    
    public function deleteSubscribers() 
    {
        if(!empty($this->selected)) {
            Newsletter::destroy($this->selected);
            $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Selected Subscribers Are Deleted!')]);
        } else {
            $this->dispatchBrowserEvent('alert', ['type' => 'warning',  'message' => __('Please, Select At Least One Item!')]);
        }
    }

    public function updatedSelectAll($value) 
    {
        if($value) {
            $this->selected = Newsletter::pluck('id')->toArray();
        } else {
            $this->selected = [];
        }
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
        return view('livewire.newsletter-table', [
            'subscribers' => Newsletter::where('email', 'like', '%'.trim($this->search).'%')
            ->when($this->sortField, function($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate($this->paginate),
        ]);
    }
}

