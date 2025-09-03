<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Livewire\Forms\ProductForm;
use App\Enums\ProductStatus;

class CreateProduct extends Component
{
    public ProductForm $form;

    public $productStatus;

    public function mount() {
        $this->productStatus = ProductStatus::cases();
    }

    public function save()
    {
        $this->form->store();
        return $this->redirect('/admin/products');
    }
    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
