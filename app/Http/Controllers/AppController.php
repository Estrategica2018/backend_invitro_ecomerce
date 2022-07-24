<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
     
    /**
     * Get a data app configuration.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function configuration(Request $request)
    {
         return response()->json([
            'icon' => 'https://res.cloudinary.com/deueufyac/image/upload/v1657912035/e-commerce/icon-invitro_xnxxjq.png',
            'name' => 'Invitro Colombia'
        ],201);
    }
}
