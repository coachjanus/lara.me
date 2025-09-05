<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;

class PostForm extends Form
{
    public ?Post $post;
    #[Validate('required|min:5')]
    public $post_title = '';
    #[Validate('required')]
    public $content = '';
    

    public $cover;
    public $oldCover;
   

}
