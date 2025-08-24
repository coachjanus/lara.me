<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = DB::table("brands")->get();
        return view("admin.brands.index", ['brands'=>$brands, "title"=>"Brands Management"]);
    }

    public function create()
    {
        
        return view("admin.brands.create", ["title"=>"Create New Brands"]);
    }
}
