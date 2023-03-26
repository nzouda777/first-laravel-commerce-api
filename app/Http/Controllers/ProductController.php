<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResources;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return all product
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $fields = $request->validated();
        //create a product
        $product = Product::create([
            "name" => $fields['name'],
            "slug" => str_replace(" ", "-", $fields['name']),
            "description" => $fields['description'],
            "price" => $fields['price']
        ]);
        return response()->json('product create');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //display a single product
        return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        //
        $product->update($request->validated());
        // $product = Product::find($id);
        // $product->update($request->all());
        return response()->json("updated");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response()->json("Product deleted");
    }
    /**
     * Search the specified resource from storage.
     * @param str $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        //
        //$product->delete();
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}
