<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Producto registrado exitosamente!',
            'data' => [
                'product' => $product,
            ]
        ],201);

    }

    public function update (UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Producto actualizado exitosamente!',
            'data' => [
                'product' => $product,
            ]
        ],201);
    }

    public function list ()
    {
        $products = Product::with('category')->get();
        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Productos consultados exitosamente!',
            'data' => [
                'product' => $products,
            ]
        ],201);
    }
}
