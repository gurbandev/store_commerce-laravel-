@extends('layouts.app')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <div class="container-lg py-3">
        <div class="h3">
            {{ $product->name }}
        </div>
        @include('app.product')
    </div>
@endsection