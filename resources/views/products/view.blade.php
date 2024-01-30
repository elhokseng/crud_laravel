@extends('layouts.app')
@section('main')
    <div class="container mt-5">
        <div class=" d-flex justify-content-center">
                <div class="card border-primary p-4">
                    <h1><span class="text-muted">Name:</span> {{ $product->name }}</h1>
                    <p><span class="text-muted">Description:</span> {{ $product->description }}</p>
                    <img src="/products/{{ $product->image }}" alt="{{ $product->name }}">
                </div>
            </div>
        </div>
    </div>
@endsection
