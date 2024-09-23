<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(14);  // orderBy('created_at','desc') = latest()
        return view('products.index',[
            'products' => $products
        ]);
    }
    
    public function shop()
    {
            $products = Product::latest()->paginate(14);  // orderBy('created_at','desc') = latest()
            return view('products.shop',[
                'products' => $products
            ]);
    }

    public function show(Product $product)
    {
        return view('products.show' , [ 'product' => $product ]);
    }
}
