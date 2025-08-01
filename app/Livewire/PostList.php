<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component {

    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';

    public function setSort($sort) {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
        $this->resetPage(); // Reset pagination when changing sort order
    }

    #[On('search')]
    public function updateSearch($search) {
        $this->search = $search;
    }

    public function clearFilters() {
        $this->reset(['search', 'category']);
        $this->resetPage(); // Reset pagination when clearing filters
    }

    #[Computed()]
    public function posts() {
        return Post::published()
            ->orderBy('published_at', $this->sort)
            ->where('title', 'like', "%{$this->search}%")
            ->when($this->activeCategory(), function ($query) {
                $query->withCategory($this->category);
            })
            ->paginate(3);
    }

    #[Computed()]
    public function activeCategory() {
        return Category::where('slug', $this->category)->first();
    }

    public function render() {
        return view('livewire.post-list');
    }
}
