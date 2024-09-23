<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
        // Get the current cart from the session, or an empty array if it doesn't exist
        $cart = session()->get('cart', []);
        // If product already exists in the cart, increase the quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Add the product to the cart
            $cart[$id] = [
                "name" => $product->name,
                "type" => $product->type,
                "price" => $product->price,
                "description" => $product->description,
                "image" => $product->image,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Product removed from cart!');
    }

    public function clearCart()
    {
        // Clear the cart from the session
        session()->forget('cart');

        // Redirect back with a success message
        return redirect()->route('cart')->with('success', 'Successfull Checkout!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
