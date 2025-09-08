<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;

class PostForm extends Form
{
    public ?Post $post;
    #[Validate('required|min:5')]
    public $post_title = '';
    #[Validate('required')]
    public $content = '';
    

    public $cover;
    public $oldCover;
    public $status = 0;
    public $user_id;
    public $tags = [];

    public function store() {
        $this->validate();
        $this->cover = $this->cover->store('posts', 'public');

        $post = Post::create( ['post_title' => $this->post_title, 'content' => $this->content, 'user_id'=> Auth::id(), 'status'=>$this->status, 'cover'=>$this->cover]);
        $post->tags()->sync($this->tags);
    }

    public function setProduct(Post $post) {
        $this->post = $post;
        $this->post_title = $post->post_title;
        $this->content = $post->content;
        $this->status = $post->status;
        $this->user_id = $post->user_id; 
        $this->tags = $post->tags; 
        $this->oldCover = $post->cover;
    }

   

    public function update()
    {
        $this->validate();
        if ($this->cover) {
            if ($this->oldCover != null && Storage::disk('public')->exists($this->oldCover)) {
                Storage::disk('public')->delete($this->oldCover);
            }
            $this->cover = $this->cover->store('posts', 'public');
        } else {
            $this->cover = $this->oldCover;
        }
        $this->post->update($this->all());

    }
   

}
