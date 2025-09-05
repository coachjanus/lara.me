<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\Attributes\{Validate, Layout};
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Livewire\Forms\PostForm;

#[Layout("layouts.admin")]
class CreatePost extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $post_title = '';
    #[Validate('required')]
    public $content = '';
    public $slug = '';

    public $title = 'New Post';
    public $breadcrumb = "Post management";

    public PostForm $form;


    public function save() 
    {
        $this->validate();
        $this->slug = Str::slug($this->post_title, '_');
        Post::create(
        $this->only(['post_title', 'content', 'slug'])
        );
        return $this->redirect('/admin/posts');
    }
    public function render()
    {
        return view('livewire.admin.posts.create-post');
    }
}
