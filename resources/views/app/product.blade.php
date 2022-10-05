<div class="bg-white border rounded p-3">
    <a href="{{ route('products.show', $product->slug) }}" class="h6 d-block">
        {{ $product->name }}
    </a>
    <div class="h6">
        <span class="text-secondary">Category</span>
        <a href="{{ route('categories.show', $product->category->slug) }}">
            {{ $product->category->name }}
        </a>
    </div>
    <div class="h6">
        <span class="text-secondary">Brand</span>
        <a href="{{ route('brands.show', $product->brand->slug) }}">
            {{ $product->brand->name }}
        </a>
    </div>
    <div class="h6">
        <span class="text-secondary">Barcode</span>
        {{ $product->barcode }}
    </div>
    <div class="h6">
        <span class="text-secondary">Price</span>
        {{ $product->price }} <small>TMT</small>
    </div>
</div>