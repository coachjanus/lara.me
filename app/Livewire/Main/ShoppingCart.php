<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\Attributes\{Layout, Title, Computed, On, Url};

#[Title("Catalog page")]
#[Layout('layouts.app')]
class ShoppingCart extends Component
{
    public $cartItems = [];
    public $tax = .07;

    protected $listeners = [
        'cartUpdated' => '$refresh'
    ];

    public function remove($id) {
        $this->dispatch('cart_updated');
    }

    public function clear() {
        \Cart::clear();
        $this->dispatch('cart_updated');
    }

    public function render()
    {
        $this->cartItems = \Cart::getContent()->toArray();
        return view('livewire.main.shopping-cart');
    }
}
