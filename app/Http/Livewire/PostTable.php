<?php

namespace App\Http\Livewire;

use App\Models\Admin\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostTable extends Component
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
        Post::find($this->deleteId)->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'message' => __('Post Is Deleted!')]);
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
        $posts = Post::select(['posts.*', 'blog_category_translations.category_name as category_name'])
            ->join('blog_categories', 'posts.category_id', '=', 'blog_categories.id')
            ->join('blog_category_translations', 'blog_categories.id', '=', 'blog_category_translations.blog_category_id')->where('blog_category_translations.locale', app()->getLocale())
            ->search($this->search)
            ->when($this->sortField, function($query) {
                $query->when($this->sortField == 'title', function ($query) {
                    $query->orderByTranslation($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->when($this->sortField == 'category_name', function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->when(!in_array($this->sortField, ['title', 'category_name']), function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                });
            })->paginate($this->paginate);

        return view('livewire.post-table', [
            'posts' => $posts,
        ]);
    }
}
