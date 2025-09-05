<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;


use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Product;

#[Title("Management product list")]
class ProductTable extends Component
{
     use WithPagination;
    public $title = 'Product List...';
     public $breadcrumb = "Product management";
    public $perPage = 7;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';
    public $search = '';

    public function setSort($colName) {
        if ($this->sortBy = $colName) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $colName;
        $this->sortDir = 'ASC';
    }
    
    public function query() : Builder
    {
        return Product::query();
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.products.product-table',[
            'products' => Product::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage)]);
    }
    
}
