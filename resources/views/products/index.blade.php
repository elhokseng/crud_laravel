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
                        <a href="{{ route('product.create', 'query') }}"><button class="btn btn-dark"> New
                                product</button></a>
                    </div>
                </div>

            </div>
            <div class="col-12">
                {{-- <div class="mb-4">
                    <form class="d-flex" method="get" action="/search   ">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search....." value="{{ isset($search) ? $search : ''}}">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>   --}}

                {{-- <form action="{{ route('product.search') }}" method="GET" > --}}
                <form action="{{ route('product.search') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Search....">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

                <div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-centered mb-0">
                                <thead>
                                    <p> Product Total: {{ $productCount }} </p>
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
                                    @foreach ($products as $key => $items)
                                        <tr>
                                            <td>
                                                {{ $items->id }}
                                            </td>
                                            <td>
                                                <a class="nav-link"
                                                    href="product/{{ $items->id }}/view">{{ $items->name }}</a>
                                            </td>
                                            <td>
                                                {{ $items->description }}
                                            </td>
                                            <td>
                                                {{ $items->created_at }}
                                            </td>
                                            <td>
                                                {{ $items->updated_at }}
                                            </td>
                                            <td>
                                                <img src="products/{{ $items->image }}" class="rounded-circle"
                                                    width="50" height="50">
                                            </td>
                                            <td><a href="product/{{ $items->id }}/view"><button
                                                        class="btn btn-dark">view</button></a></td>
                                            <td><a href="product/{{ $items->id }}/edit"><button
                                                        class="btn btn-success">edit</button></a></td>
                                            <td><a href="product/{{ $items->id }}/delete"><button
                                                        class="btn btn-danger">delete</button></a></td>
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
            {{ $products->links() }}
        </div>
    </div>
@endsection
