<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'brand'])
            ->orderBy('id', 'desc')
            ->paginate();

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


    public function create()
    {
        $categories = Category::orderBy('slug')
            ->get();
        $brands = Brand::orderBy('slug')
            ->get();

        return view('product.create')
            ->with([
                'categories' => $categories,
                'brands' => $brands,
            ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|integer|min:1',
            'brand' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = new Product();
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->name = $request->name;
        $product->slug = str($request->name)->slug();
        $product->barcode = $request->barcode;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.show', $product->slug)
            ->with([
                'success' => 'Product created!',
            ]);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('slug')
            ->get();
        $brands = Brand::orderBy('slug')
            ->get();

        return view('product.edit')
            ->with([
                'product' => $product,
                'categories' => $categories,
                'brands' => $brands,
            ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|integer|min:1',
            'brand' => 'required|integer|min:1',
            'name' => 'required|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->name = $request->name;
        $product->slug = str($request->name)->slug();
        $product->barcode = $request->barcode;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->update();

        return redirect()->route('products.show', $product->slug)
            ->with([
                'success' => 'Product updated!',
            ]);
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('home')
            ->with([
                'success' => 'Product deleted!',
            ]);
    }
}
