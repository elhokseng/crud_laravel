@extends('layouts.app')
@section('main')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div>
                    <div class="m-3 float-start">
                        <h1>
                            PRODUCTS
                        </h1>
                    </div>
                    <div class="m-3 float-end">
                        <a href="{{ route('product.create') }}"><button class="btn btn-dark"> New product</button></a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                    <p> Product Total: {{$productCount}} </p>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created_at</th>
                                        <th>updated_at</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key=>$item)
                                    <tr>
                                        <td>
                                            {{ $key+1}}
                                        </td>
                                        <td>
                                            <a class="nav-link" href="product/{{$item->id}}/view">{{$item->name}}</a>
                                        </td>
                                        <td>
                                            {{$item->description}}
                                        </td>
                                        <td>
                                            {{$item->created_at}}
                                        </td>
                                        <td>
                                            {{$item->updated_at}}
                                        </td>
                                        <td>
                                            <img src="products/{{$item->image}}" class="rounded-circle" width="50" height="50">
                                        </td>
                                        <td><a href="product/{{$item->id}}/view"><button class="btn btn-dark">view</button></a></td>
                                        <td><a href="product/{{$item->id}}/edit"><button class="btn btn-success">edit</button></a></td>
                                        <td><a href="product/{{$item->id}}/delete"><button class="btn btn-danger">delete</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="mt-4">
            {{$products->links()}}
        </div>
    </div>
@endsection