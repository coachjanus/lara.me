<?php

namespace App\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use Livewire\Attributes\{Layout};

#[Layout("layouts.admin")]
class PostTable extends Component
{
    use WithPagination;   
    public $perPage = 7;
    public $search = '';

    public $sortByColumn = 'created_at';

    public $sortDirection = 'DESC';

    public function setSortFunctionality($columnName)
    {
        if ($this->sortByColumn == $columnName) {
            $this->sortDirection = ($this->sortDirection == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortByColumn = $columnName;
        $this->sortDirection = 'ASC';
    }
    public function render()
    {
        return view('livewire.admin.posts.post-table', ['posts' => Post::search($this->search)
        ->orderBy($this->sortByColumn,$this->sortDirection)
        ->paginate($this->perPage)]);
    }
}
