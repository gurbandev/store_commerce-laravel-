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
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm">
        <i class="bi-pencil-fill"></i> Edit
    </a>
    <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
        <i class="bi-trash-fill"></i> Delete
    </button>
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>Are you sure to delete "{{ $product->name }}"?</div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('products.delete', $product->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-dark btn-sm">
                            <i class="bi-trash-fill"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>