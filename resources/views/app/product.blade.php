<div class="bg-white border rounded p-3">
    <a href="{{ route('products.show', $product->slug) }}" class="h6 d-block">
        {{ $product->name }}
    </a>
    <div class="h6 small">
        <a href="{{ route('categories.show', $product->category->slug) }}" class="link-secondary">
            {{ $product->category->name }}</a>
        <span class="mx-1">∙</span>
        <a href="{{ route('brands.show', $product->brand->slug) }}" class="link-secondary">
            {{ $product->brand->name }}</a>
    </div>
    <div class="h6 small">
        <i class="bi-upc-scan"></i>
        {{ $product->barcode }}
    </div>
    <div class="h6 small">
        {{ number_format($product->price, 2, '.', ' ') }} <small>TMT</small>
    </div>
    <div class="h6 small">
        <i class="bi-box-fill text-secondary"></i>
        {{ $product->stock }}
        <span class="mx-1">∙</span>
        <i class="bi-eye-fill text-secondary"></i>
        {{ $product->viewed }}
    </div>
</div>