<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Livewire\Forms\ProductForm;
use App\Enums\ProductStatus;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;


use App\Models\{Brand, Category};

use Livewire\WithFileUploads;

#[Title("Create new product")]
#[Layout("layouts.admin")]
class CreateProduct extends Component
{
    use WithFileUploads;
    public $title = 'New Product';
    public $breadcrumb = "Product management";

    public ProductForm $form;

    public $productStatus;

    public $categories;
    public $brands;

    public function mount()
    {
        $this->productStatus = ProductStatus::cases();
        $this->categories = Category::pluck('name', 'id');
        $this->brands = Brand::pluck('name', 'id');
    }

    // public function mount() {
    //     $this->productStatus = ProductStatus::cases();
    // }

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
