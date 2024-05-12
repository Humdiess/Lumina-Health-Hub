<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('auth.login', compact('products'));
    }

    public function checkout(Request $request)
    {
        $productId = $request->input('product');
        $product = Product::findOrFail($productId);

        // You can add the logic to store the order, display the checkout page, etc.
        // For now, we'll just pass the product data to the checkout view.

        return view('lumina.checkout', compact('product'));
    }
}
