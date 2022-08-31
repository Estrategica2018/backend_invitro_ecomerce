<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Models\Service;
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

    public function get($productId)
    {
        $product = Product::find($productId);
        if($product) {
            return response()->json([
                'overall_status' => 'successfull',
                'message' => '¡Productos consultado exitosamente!',
                'data' => [
                    'product' => $product,
                    'service_relationship' => $this->get_services($product),
                    'product_relationship' => $this->get_products($product),
                ]
            ],201);
        }
        else {
            return response()->json([
                'overall_status' => 'error',
                'message' => 'Producto no existe!'                
            ],404);
        }
    }

    public function get_services ($product)
    {
        return Service::whereIn('id',explode('|',$product->service_relationship))->get();
    }

    public function get_products ($product)
    {
        return Product::whereIn('id',explode('|',$product->product_relationship))->get();
    }
}
