@extends('layouts.app')
@section('main')
    <div class="container mt-5">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf   
            @method('POST')
            <div class="form-group">
                <select class="form-select mb-3" aria-label="Default select example"  name="category_id"> 
                    <option selected>select category</option>
                    @foreach ($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach 
                  </select>
            </div>
            <div class="form-group">
                <label class="form-label">Name</label>
                <input name="name" type="text" class="form-control" aria-describedby="nameHelpBlock" value="{{old('name')}}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" value="{{old('description')}}"></textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label">Image</label>
                <input name="image" type="file" class="form-control" aria-describedby="imageHelpBlock">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
            <div class="mt-4 d-flex">
                <button class="btn btn-dark btn-lg me-2e">Submit</button>
                <button class="btn btn-primary btn-lg"> 
                    <a class="nav-link text-light" href="{{URL::route('product.index')}}">Back</a>
                </button>
            </div>
        </form>
    </div>
@endsection
