<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Computed, On, Url};
use Livewire\WithPagination;
use App\Models\{Product, Post};
use Illuminate\Support\Facades\Cache;

#[Title("Home page")]
#[Layout('layouts.app')]
class HomePage extends Component
{
    public $latestPosts;

    public function mount() {
        $this->latestPosts = Cache::remember('latestPosts', now()->addDay(), function(){
            return Post::published()->with('tags')->latest('updated_at')->take(3)->get();
        });
    }
    public function render()
    {
        return view('livewire.main.home-page');
    }
}
