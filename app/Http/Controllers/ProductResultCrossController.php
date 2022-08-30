<?php

namespace App\Http\Controllers;

use App\Models\ProductResultCross;
use Illuminate\Http\Request;

class ProductResultCrossController extends Controller
{
    //
    public function store()
    {

    }

    public function update()
    {

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
