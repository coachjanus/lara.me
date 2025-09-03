<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Enums\ProductStatus;
use App\Livewire\Forms\ProductForm;
use App\Models\Product;

class UpdateProduct extends Component
{

    public ProductForm $form;
    public $productStatus;
    public function mount(Product $product) {
        $this->productStatus = ProductStatus::cases();
        $this->form->setProduct($product);
    }
    public function save(){
        $this->form->update();
        return $this->redirect('/admin/products');
    }


    public function render()
    {
        return view('livewire.admin.products.update-product');
    }
}
