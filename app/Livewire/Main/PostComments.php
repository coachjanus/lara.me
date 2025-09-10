<?php

namespace App\Livewire\Main;

use Livewire\Component;

use App\Models\{Post, Tag};
use Livewire\Attributes\{Layout, Title, Computed, Rule, Url};
use Livewire\WithPagination;

#[Title("Post page")]
#[Layout('layouts.app')]
class PostComments extends Component
{
    use WithPagination;
    public Post $post;

    #[Rule('min:3|max:256')]
    public string $comment;

    public function postComment() {
        
        if(auth()->guest()) {
            return;
        }
        $this->validateOnly('comment');

        $this->post->comments()->create([
            'comment' => $this->comment,
            'user_id' => auth()->id()
        ]);
        $this->reset('comment');
    }

    #[Computed()]
    public function comments() {
        return $this?->post?->comments()->with('user')->latest()->paginate();
    }

    public function render()
    {
        return view('livewire.main.post-comments');
    }
}
