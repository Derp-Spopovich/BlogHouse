<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Form extends Component
{
    use WithPagination;

    public $post;
    public $search;

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.form', [
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')->latest()->Paginate(5),
        ]);
    }
}
