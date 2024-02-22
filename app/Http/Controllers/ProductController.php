<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products = product::get()->paginate(3);
        $productCount = Product::count();
        // return view('products.index', ['products' => $products], ['productCount' => $productCount]);
        // return view('products.index',['products' => product::orderBy('id','Asc')->latest()->paginate(3)],['productCount' => $productCount]);
        $products = product::orderBy('id','Asc')->latest()->paginate(3);
        return view('products.index',compact('productCount','products'));
    }

    public function create()
    {
        $category = category::all();
        return view('products.create',compact('category')); 
    }

        public function store(request $request)
        {
            $imageName = null;
            // validation data
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000',
                'category_id' => 'required'
            ]);

            // uploard image  
        if($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
        
            } else {
            return null;   
            }
            
            // // first writing 
            // $product = new product; 
            // $product->name = $request->name;
            // $product->description = $request->description;
            // $product->image = $imageName;
            // $product->category_id = $request->category_id;
            // $product->save();

            // second writing
            $products = 
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'image' => $imageName,
                'category_id' => $request->input('category_id'),
                'created_at' => now(),
                'deleted_at' => now(),
            ];
            
            product::create($products);
            
            return redirect()->route('product.index')->withSuccess('Product Created !!!');
        }


    public function edit($id)   
    {
        $product = Product::where('id', $id)->first();  
        return view('products.edit', ['product' => $product]);
    }

    public function update(request $request, $id)
    {
        // validation data
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:10000' 
        ];
        $this->validate($request,$rules);   

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

        return redirect()->route('product.index')->withSuccess('Sucess Updated !!!!');
    }

   

    public function delete($id)
    {
        $product = product::where('id',$id)->first();
        $product->delete();
        
        return back()->withSuccess('Product Deleted !!!!');
        
    }

    public function view($id)
    {
        $categorys = category::with('product')->find($id);
        $product = product::where('id',$id)->first();
        return view('products.view',compact('product','categorys'));
    }   

    // for search 
    // public function Search(Request $request)
    // {
    //     $search = $request->search;

    //     $result = product::where(id, '1');
    //     dd($result);
        
    //     return view('products.index',['result'=> $result]);
    // }

    // ========== search ===============//
    public function Search(Request $request)
    {
        $query = $request->input('query');

        // Perform search logic based on the query
        $results = product::where('name','LIKE','%' . $query . '%')->get();
        // $results = product::find($query);
        // dd($results);
        return view('products.search', compact('results'));
        // return response($results);
      
    }   

    //===== for search reloard ====//
    // public function Search(Request $request)
    // {
    //     $search = $request->search;

    //     $result = product::where(function($query) use ($search)

    //         {
    //             $query->where('name','LIKE','%'. $search .'%')
    //                 ->orWhere('description','LIKE','%'. $search .'%')
    //                 ->get();
    //         }   
    //     );

    //     return view('products.search',compact('search','result'));
    // }

}