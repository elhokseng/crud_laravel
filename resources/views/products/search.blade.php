@extends('layouts.app')
@section('main')
    <div class="container">

        <button class="btn btn-primary btn-sm mt-3 mb-3">
            <a href="{{route('product.index')}}" class="nav-link text-light">
                Back
            </a>
        </button>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-centered mb-0">
                    <thead>
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
                        @foreach ($results as $result)
                        <tr>
                            <td>
                                {{ $result->id }}
                            </td>
                            <td>
                                <a class="nav-link" href="product/{{ $result->id }}/view">{{ $result->name }}</a>
                            </td>
                            <td>
                                {{ $result->description }}
                            </td>
                            <td>
                                {{ $result->created_at }}
                            </td>
                            <td>
                                {{ $result->updated_at }}
                            </td>
                            <td>
                                <img src="products/{{ $result->image }}" class="rounded-circle" width="50" height="50">
                            </td>
                            <td><a href="product/{{ $result->id }}/view"><button class="btn btn-dark">view</button></a>
                            </td>
                            <td><a href="product/{{ $result->id }}/edit"><button class="btn btn-success">edit</button></a>
                            </td>
                            <td><a href="product/{{ $result->id }}/delete"><button
                                        class="btn btn-danger">delete</button></a></td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td>
                                {{ $result->id }}
                            </td>
                            <td>
                                <a class="nav-link" href="product/{{ $result->id }}/view">{{ $result->name }}</a>
                            </td>
                            <td>
                                {{ $result->description }}
                            </td>
                            <td>
                                {{ $result->created_at }}
                            </td>
                            <td>
                                {{ $result->updated_at }}
                            </td>
                            <td>
                                <img src="products/{{ $result->image }}" class="rounded-circle" width="50" height="50">
                            </td>
                            <td><a href="product/{{ $result->id }}/view"><button class="btn btn-dark">view</button></a>
                            </td>
                            <td><a href="product/{{ $result->id }}/edit"><button class="btn btn-success">edit</button></a>
                            </td>
                            <td><a href="product/{{ $result->id }}/delete"><button
                                        class="btn btn-danger">delete</button></a></td>
                        </tr> --}}

                    </tbody>
                </table>
            </div>
        @endsection
