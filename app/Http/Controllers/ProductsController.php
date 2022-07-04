<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function getProducts()
    {
        return response()->json(Products::all(), 200);
    }


    public function getProductsById($id)
    {
        $product = Products::find($id);

        if(is_null($product)){
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product::find($id), 200);
    }
    


    public function addProduct(Request $request)
    {
        $product = Products::create($request->all());
        return response($product, 201);
    }

    public function editProduct(Request $request, $id)
    {
        $product = Products::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->all());
        return response($product, 200);
    }


    public function deleteProduct($id)
    {
        $product = Products::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response($product, 204);
    }
}
 