<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])
            ->paginate(50);

        return view('index')
            ->with([
                'products' => $products,
            ]);
    }


    public function show($id)
    {
        $product = Product::with(['category', 'brand'])
            ->findOrFail($id);

        return view('show')
            ->with([
                'product' => $product,
            ]);
    }
}
