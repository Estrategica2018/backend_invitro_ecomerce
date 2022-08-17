<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //

    public function store (StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Servicio registrado exitosamente!',
            'data' => [
                'service' => $service,
            ]
        ],201);
    }

    public function update (UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Servicio actualizado exitosamente!',
            'data' => [
                'service' => $service,
            ]
        ],201);
    }

    public function list ()
    {
        $services = Service::all();

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Servicios consultados exitosamente!',
            'data' => [
                'services' => $services,
            ]
        ],201);
    }
}
