<?php

namespace App\Livewire\Main;

use Livewire\Component;

use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\{Post, Tag};
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

#[Title("Blog page")]
#[Layout('layouts.app')]
class BlogPage extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $popular = false;
    
    #[Url()]
    public $tag;

    public $tags = [];
    public $resentPosts = [];


    public function setSort($sort) {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    public function clearFilters() {
        $this->tag = '';
        $this->search = '';
        $this->resetPage();
    }

    #[On('search')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
    }

    public function mount() {
        $this->tags = Tag::whereHas('posts', function($query) {
            $query->published();
        })->take(10)->get();
        $this->resentPosts = Post::latest()->take(4)->get();
    }

    #[Computed()]
    public function posts() {
        return Post::published()
        ->with('user', 'tags')
        ->when($this->activeTag, function($query){
            $query->withTag($this->tag);
        })
        ->when($this->popular, function($query){
            $query->popular();
        })
        ->search($this->search)
        ->orderBy('updated_at', $this->sort)
        ->paginate();
    }

    #[Computed()]
    public function activeTag() {
        if ($this->tag == null || $this->tag == '') {
            return null;
        }
        return Tag::where('slug', $this->tag)->first();
    }

    public function render()
    {
        return view('livewire.main.blog-page', [
            'posts'=>$this->posts(), 'latestPosts'=>$this->resentPosts
        ]);
    }
}
