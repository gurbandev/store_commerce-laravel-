<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'sort' => 'nullable|string|size:11',
        ]);
        $sort = $request->has('sort') ? $request->sort : null;

        $products = Product::with(['category', 'brand'])
            ->when($sort, function ($query, $sort) {
                if ($sort == 'low-to-high') {
                    $query->orderBy('price')
                        ->orderBy('stock', 'desc');
                } elseif ($sort == 'high-to-low') {
                    $query->orderBy('price', 'desc')
                        ->orderBy('stock', 'desc');
                } elseif ($sort == 'most-viewed') {
                    $query->orderBy('viewed', 'desc')
                        ->orderBy('stock', 'desc');
                } else {
                    $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->paginate();

        $products = $products->appends(['sort' => $sort]);

        return view('product.index')
            ->with([
                'products' => $products,
            ]);
    }


    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->with(['category', 'brand'])
            ->firstOrFail();

        return view('product.show')
            ->with([
                'product' => $product,
            ]);
    }
}
