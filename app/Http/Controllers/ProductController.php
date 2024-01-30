<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = product::get()->paginate(3);
        $productCount = Product::count();
        // return view('products.index', ['products' => $products], ['productCount' => $productCount]);
        return view('products.index',['products' => product::latest()->paginate(3)],['productCount' => $productCount]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(request $request)
    {
        // validation data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000'
        ]);

        // uploard image  
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        $product = new product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;

        $product->save();
        return back()->withSuccess('Product Created !!!');
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();  
        return view('products.edit', ['product' => $product]);
    }

    public function update(request $request, $id)
    {
        // validation data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000' 
        ]);

        $product = product::where('id',$id)->first();

        if (isset($request->image)) {
            // uploard image  
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        

        $product->save();

        return back()->withSuccess('Sucess Updated !!!!');
    }

    public function delete($id)
    {
        $product = product::where('id',$id)->first();
        $product->delete();
        
        return back()->withSuccess('Product Deleted !!!!');
    }

    public function view($id)
    {
        $product = product::where('id',$id)->first();
        return view('products.view',['product' => $product]);
    }
}
