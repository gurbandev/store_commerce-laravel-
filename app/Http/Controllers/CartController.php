<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function index()
    {
        if (Cookie::has('cart')) {
            $cartIds = explode(',', Cookie::get('cart'));
        } else {
            $cartIds = [];
        }
        $products = Product::whereIn('id', $cartIds)
            ->with(['category', 'brand'])
            ->orderBy('id', 'desc')
            ->get();

        return view('cart.index')
            ->with([
                'products' => $products,
            ]);
    }


    public function add($id)
    {
        $product = Product::findOrFail($id);

        if (Cookie::has('cart')) {
            $cartIds = explode(',', Cookie::get('cart'));
            $cartIds[] = $product->id;
            Cookie::queue('cart', implode(',', $cartIds), 60 * 24 * 3);
        } else {
            Cookie::queue('cart', $product->id, 60 * 24 * 3);
        }

        return redirect()->back();
    }
}
