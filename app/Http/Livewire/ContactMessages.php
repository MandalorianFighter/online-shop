<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactMessages extends Component
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
        $order = Contact::findOrFail($this->deleteId);
        $order->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Message Is Deleted!')]);
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
        return view('livewire.contact-messages', [
            'messages' => Contact::where(function ($query) {
                $query->where('name', 'like', '%'.trim($this->search).'%')
                    ->orWhere('email', 'like', '%'.trim($this->search).'%')
                    ->orWhere('phone', 'like', '%'.trim($this->search).'%')
                    ->orWhere('message', 'like', '%'.trim($this->search).'%');
            })->when($this->sortField, function($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->paginate($this->paginate),
        ]);
    }
}
