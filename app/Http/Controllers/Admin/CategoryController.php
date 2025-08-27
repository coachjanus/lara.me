<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(7);
        return view("admin.categories.index", ['categories'=>$categories, "title"=>"All categories", "breadcrumb"=>"Categories Management"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create", ["title"=>"Create category", "breadcrumb"=>"New Category"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show' , ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view("admin.categories.edit", ["title"=>"Edit category", "breadcrumb"=>"Update Category", "category"=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "name" => ["required",],
            
        ]);

        $category
            ->update([
                'name' => $request->name,
                'status' => $request->status ? true : false
            ]);
        
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('admin.categories.index'))->with("success", "Category moved to trash!");
    }


    public function trashed() {
        $categories = Category::onlyTrashed()->paginate();
        return view('admin.categories.trashed', ['categories'=>$categories, "title"=>"Trashed categories", "breadcrumb"=>"Categories Management"]);
    }
    public function restore($id) {
        Category::withTrashed()
        ->where('id', $id)
        ->restore();
        return redirect(route('admin.categories.trashed'))->with("success", "Category restored successfully!");
    }
    public function force($id) {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->forceDelete();
        return redirect()->route('admin.categories.index')->with("success", "Category deleted successfully");
    }
}