<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\{Title, Layout};

#[Title('Management User List')]
#[Layout('layouts.admin')]
class UserList extends Component
{
    public $title = "User List";
    public $breadcrumb = "All users";

    public function render()
    {
        return view('livewire.admin.users.user-list')->with(['user' => Auth::user()->name]);
    }
}
