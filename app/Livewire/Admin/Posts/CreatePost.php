<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use App\Livewire\Forms\PostForm;

use App\Enums\PostStatus;

use App\Models\{Tag};

use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


#[Title("Create post")]
#[Layout('layouts.admin')]
class CreatePost extends Component
{

    use WithFileUploads;

    public $title = 'New post';
    public PostForm $form;

    public $postStatus;
    public $tags;


    public function mount()
    {
        $this->postStatus = PostStatus::cases();
        $this->tags = Tag::pluck('name', 'id');
    }

    public function save()
    {
        // store
        $this->form->store();
        return $this->redirect('/admin/posts');
    }

    public function render()
    {
        return view('livewire.admin.posts.create-post');
    }
}
