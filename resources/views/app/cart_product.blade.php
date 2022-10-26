<div class="row align-items-center bg-white border rounded mb-3">
    <div class="col-auto">
        <img src="{{  $product->image ? Storage::url('products/sm/'.$product->image) : asset('img/sm/product.jpg') }}"
             alt="{{ $product->name }}" class="img-fluid rounded">
    </div>
    <div class="col-4">
        <a href="{{ route('products.show', $product->slug) }}" class="h5 d-block">
            {{ $product->name }}
        </a>
        <div class="h5 small">
            <a href="{{ route('categories.show', $product->category->slug) }}" class="link-secondary">
                {{ $product->category->name }}</a>
            <span class="mx-1">∙</span>
            <a href="{{ route('brands.show', $product->brand->slug) }}" class="link-secondary">
                {{ $product->brand->name }}</a>
        </div>
        <div class="h5 small">
            <i class="bi-upc-scan"></i>
            {{ $product->barcode }}
        </div>
    </div>
    <div class="col">
        <div class="h5 small">
            {{ number_format($product->price, 2, '.', ' ') }}
            <small>TMT</small>
        </div>
    </div>
    <div class="col">
        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-secondary btn-sm my-2">
            <i class="bi-plus-lg"></i>
        </a>
        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-secondary btn-sm my-2">
            <i class="bi-dash-lg"></i>
        </a>
    </div>
    <div class="col-auto py-3">
        <a href="{{ route('cart.remove', $product->id) }}" class="btn btn-secondary btn-sm my-2">
            <i class="bi-x-lg"></i>
        </a>
    </div>
</div>