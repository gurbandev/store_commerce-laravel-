<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
//    public function index()
//    {
//        $brands = Brand::withCount(['products'])
//            ->get();
//
//        return view('brand.index')
//            ->with([
//                'brands' => $brands,
//            ]);
//    }


    public function show(Request $request, $slug)
    {
        $request->validate([
            'sort' => 'nullable|string|size:11',
        ]);
        $sort = $request->has('sort') ? $request->sort : null;

        $brand = Brand::where('slug', $slug)
            ->firstOrFail();
        $products = Product::where('brand_id', $brand->id)
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

        return view('brand.show')
            ->with([
                'brand' => $brand,
                'products' => $products,
            ]);
    }
}
