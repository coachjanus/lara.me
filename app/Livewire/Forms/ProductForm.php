<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Product;

class ProductForm extends Form
{
    public ?Product $product;
    #[Validate('required|min:5')]
    public $name = '';
    #[Validate('required')]
    public $price = 0;
    #[Validate('required|min:5')]
    public $description = '';
    #[Validate('required')]
    public $status = 0;

    public function store() {
        $this->validate();
        Product::create( $this->all());
    }

    public function setProduct(Product $product) {
        $this->product = $product;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->status = $product->status;
    }

    public function update() {
        $this->validate();
        $this->product->update($this->all());
    }
}
