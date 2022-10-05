@extends('layouts.app')
@section('title')
    {{ $brand->name }}
@endsection
@section('content')
    <div class="container-lg py-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="h3">
                <span class="text-secondary">Brand</span>
                {{ $brand->name }}
            </div>
            @include('app.filter')
        </div>
        <div class="row g-3">
            @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3">
                    @include('app.product')
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection