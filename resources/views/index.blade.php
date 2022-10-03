<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body class="bg-light">
    <div class="container-lg py-3">
        <div class="row g-3">
            @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="bg-white border rounded p-3">
                        <a href="{{ route('product.show', $product->id) }}" class="h6 d-block">
                            {{ $product->name }}
                        </a>
                        <div class="h6">
                            Category: {{ $product->category->name }}
                        </div>
                        <div class="h6">
                            Brand {{ $product->brand->name }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</body>
</html>
