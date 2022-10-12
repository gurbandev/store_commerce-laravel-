<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
//    public function index()
//    {
//        $categories = Category::withCount(['products'])
//            ->get();
//
//        return view('category.index')
//            ->with([
//                'categories' => $categories,
//            ]);
//    }


    public function show(Request $request, $slug)
    {
        $request->validate([
            'sort' => 'nullable|string|size:11',
        ]);
        $sort = $request->has('sort') ? $request->sort : null;

        $category = Category::where('slug', $slug)
            ->firstOrFail();
        $products = Product::where('category_id', $category->id)
            ->with(['category', 'brand'])
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

        return view('category.show')
            ->with([
                'category' => $category,
                'products' => $products,
            ]);
    }
}
