<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductResultCross\StoreProductResultCross;
use App\Http\Requests\ProductResultCross\UpdateProductResultCross;
use App\Models\ProductResultCross;
use Illuminate\Http\Request;

class ProductResultCrossController extends Controller
{
    //
    public function store(StoreProductResultCross $request)
    {
        $productResultCross = ProductResultCross::create($request->all());
        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Resultado del cruce de productos registrado exitosamente!',
            'data' => [
                'product_result_cross' => $productResultCross,
            ]
        ],201);
    }

    public function update(UpdateProductResultCross $request, ProductResultCross $productResultCross)
    {
        $productResultCross->update($request->all());
        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Resultado del cruce de productos actualizado exitosamente!',
            'data' => [
                'product' => $productResultCross,
            ]
        ],201);
    }

    public function list()
    {
        $productResultCrosses = ProductResultCross::with('service','product_one','product_two')->get();

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Resultado de cruce de productos consultados exitosamente!',
            'data' => [
                'product_result_crosses' => $productResultCrosses,
            ]
        ],201);
    }
}
