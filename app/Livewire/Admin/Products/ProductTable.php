<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;

class ProductTable extends Component
{
    
    public function query() : Builder
    {
        return Product::query();
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
    public function render()
    {
        return view('livewire.admin.products.product-table');
    }
}
