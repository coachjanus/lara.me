<?php

namespace App\Livewire\Main;

use Livewire\Component;

use Livewire\Attributes\{Layout, Title, Computed, On, Url};
use Livewire\WithPagination;
use App\Models\Product;

use Illuminate\Support\Collection;


#[Title("Catalog page")]
#[Layout('layouts.app')]
class Catalog extends Component
{
    use WithPagination;

    #[Url()]
    public $sort = 'desc';

    #[Url()]
    public $search = '';

    #[Url()]
    public $popular = false;

    public Product $product;

    public Collection $products;

    public int $page = 1;
    public $perPage = 6;

    public array $quantity = [];

    public function setSort($sort) {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    #[On('search')]
    public function updateSearch($search) {
        $this->search = $search;
        $this->resetPage();
    }

    public function clearFilters() {
        $this->search = '';
        $this->resetPage();
    }

    public function mount() {
        $this->products = collect();
        foreach ($this->products as $product) {
            $this->quantity[$product->id] = 1;
        }

        $this->loadMore();


    }

    public function loadMore() {
        $this->products->push(
            ...$this->paginator->getCollection()
        );
        $this->page = $this->page + 1;
    }

    #[Computed()]
    public function paginator() {
        return Product::where("status", "!=", 0)->with(relations: 'category')->latest('updated_at')->paginate($this->perPage, ['*'], 'page', $this->page);
    }

    public function addToCart($id) {
        $this->product = Product::findOrFail($id);
        \Cart::add([
                'id' => $this->product->id,
                'name' => $this->product->name,
                'price' => $this->product->price / 100,
                'quantity' => 1,
                'attributes' => [
                    'image' => $this->product->cover
                ]
            ]);
        $this->dispatch('refresh');
    }

     
    public function render()
    {
        return view('livewire.main.catalog');
    }
}
