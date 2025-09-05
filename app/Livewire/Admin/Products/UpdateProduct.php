<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Enums\ProductStatus;
use App\Livewire\Forms\ProductForm;
use App\Models\Product;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

use App\Models\{Brand, Category};
use Livewire\WithFileUploads;

#[Title("Create new product")]
#[Layout("layouts.admin")]
class UpdateProduct extends Component
{
    use WithFileUploads;
    public $title = 'Edit Product';
    public ProductForm $form;
    public $productStatus;
    public $breadcrumb = "Product management";

    public $categories;
    public $brands;

    // public function mount(Product $product) {
    //     $this->productStatus = ProductStatus::cases();
    //     $this->form->setProduct($product);
    // }
    // public function save(){
    //     $this->form->update();
    //     return $this->redirect('/admin/products');
    // }

    public function mount(Product $product)
    {
        $this->productStatus = ProductStatus::cases();
        $this->categories = Category::pluck('name', 'id');
        $this->brands = Brand::pluck('name', 'id');

        $this->form->setProduct($product);
    }

    public function save()
    {
        // update
        $this->form->update();
        return $this->redirect('/admin/products');
    }


    public function render()
    {
        return view('livewire.admin.products.update-product');
    }
}
