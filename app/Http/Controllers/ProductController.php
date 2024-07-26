<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(14);  // orderBy('created_at','desc') = latest()
        return view('pages.products',[
            'products' => $products
        ]);
    }
}
