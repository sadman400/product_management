<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // index
    function index (Request $request) {

        $products = Product::latest()->paginate(4);

        if ($request->has('search')) {
            $products = Product::where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('description', 'like', '%' . $request->search . '%');
            })->latest()->paginate(3);
        }

        if ($request->has('sort')) {
            $products = Product::orderBy('price', $request->sort)->latest()->paginate(3);
        }

        return view('products.index', ['products' => $products]);
    }


    // create
    function create () {
        return view('products.create');
    }

    // store
    function store (Request $request) {
        $request->validate([
            'product_id' => ['required', 'unique:products'],
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'stock' => ['nullable', 'numeric'],
            'description' => ['nullable'],
            'image' => ['file', 'max:10000', 'mimes:jpeg,png,jpg,gif,svg', 'nullable'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('products_images', $request->image);
        }

        Product::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('products.index');
    }


    // show
    function show (Product $product) {

        return view('products.show', ['product' => $product]);
    }


    // edit
    function edit (Product $product) {
        return view('products.edit', ['product' => $product]);
    }


    // update
    function update (Request $request, Product $product) {
        $request->validate([
            'product_id' => ['required'],
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'stock' => ['nullable', 'numeric'],
            'description' => ['nullable'],
            'image' => ['file', 'max:10000', 'mimes:jpeg,png,jpg,gif,svg', 'nullable'],
        ]);

        $path = $product->image ?? null;
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = Storage::disk('public')->put('products_images', $request->image);
        }

        $product->update([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('products.index');
    }


    // destroy
    function destroy (Product $product) {
        $product->delete();
        return redirect()->route('products.index');
    }
}
