@extends('layouts.app')
@section('main')
    <div class="container mt-5">
        <div>
            <div class="btn btn-primary">
                <a href="{{URL::route('product.index')}}">
                    <i class="fa fa-solid fa-backward"></i>
                    <span class="text-dark"> Back </span>
                </a>
            </div>
            
        </div>
        <div class=" d-flex justify-content-center">
                <div class="card border-primary p-4">
                    <h1><span class="text-muted">Name:</span> {{ $product->name }}</h1>
                    <h3><span class="text-warning">Category :</span> {{ $categorys->name }}</h3>
                    <p><span class="text-muted">Description:</span> {{ $product->description }}</p>
                    <img src="/products/{{ $product->image }}" alt="{{ $product->name }}">
                </div>
            </div>
        </div>
    </div>
@endsection
