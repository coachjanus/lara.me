<?php

// use App\Livewire\Main\BlogPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\{BrandController, CategoryController};
use App\Livewire\Admin\Users\UserList;
use App\Livewire\Admin\Users;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Livewire\Main\{HomePage, BlogPage, PostShow};
Route::get('/', HomePage::class)->name('home');
Route::get('/blog', BlogPage::class)->name('blog');
Route::get('blog/show', PostShow::class)->name('post.show');

// Route::get('/blog/show/{post:slug}', PostShow::class)->name('post.show');

// Route::get('shop', Catalog::class)->name('shop');
// Route::get('shopping-cart', ShoppingCart::class)->name('shopping.cart');

// Route::get('/checkout', function () {
//     return 'Checkout!';
// })->name('checkout');

Route::get('/about', [AboutController::class, 'index']);

Route::get('/admin/brands', [BrandController::class, 'index']);

Route::get('/admin/brands/create', [BrandController::class, 'create']);

Route::get('/admin/categories/trashed', [CategoryController::class, 'trashed'])->name('admin.categories.trashed');


Route::get('/mailable', function () {
// $invoice = App\Models\Invoice::find(1);
    return new App\Mail\OrderShipped();
});

Route::get("admin/users", UserList::class)->name('admin.users');

use App\Livewire\Admin\Products\{CreateProduct, ProductTable, UpdateProduct};

Route::get('admin/products', ProductTable::class)->name('admin.products');
Route::get('admin/products/create', CreateProduct::class)->name('admin.products.create');
Route::get('admin/products/{product}/update', UpdateProduct::class)->name('admin.products.update');

use App\Livewire\Admin\Posts\{CreatePost, PostTable, UpdatePost};

Route::get('admin/posts', PostTable::class)->name('admin.posts');
Route::get('admin/posts/create', CreatePost::class)->name('admin.posts.create');
// Route::get('admin/posts/{post}/update', UpdatePost::class)->name('admin.posts.update');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands.index');

    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');

    Route::post('/admin/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');

    Route::name('admin.')->group(function () {
        Route::resource('admin/categories', CategoryController::class);
    });

   
});



//  Route::controller(CategoryController::class)->group(function () {
// Route::get('admin/categories/trashed', 'trashed')->name('admin.categories.trashed');
Route::post('/admin/categories/restore/{id}', [CategoryController::class, 'restore'])->name('admin.categories.restore');
Route::delete('admin/categories/force/{id}', [CategoryController::class, 'force'])->name('admin.categories.force');
//     });