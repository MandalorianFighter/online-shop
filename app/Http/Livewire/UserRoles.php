<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Admin;

class UserRoles extends Component
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
        $user = Admin::findOrFail($this->deleteId);
        $user->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Admin Is Deleted!')]);
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
        return view('livewire.user-roles', [
            'users' => Admin::where('type', 2)
            ->when($this->sortField, function($query) {
                $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            })->where(function ($query) {
                $query->where('name', 'like', '%'.trim($this->search).'%')
                    ->orWhere('phone', 'like', '%'.trim($this->search).'%');
            })->paginate($this->paginate),
            ]);
    }
}
