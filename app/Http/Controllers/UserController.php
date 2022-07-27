<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function find (Request $request, $email){

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'message' => 'No se encuentra el usuario.',
                'status' => 404
            ], 200);
        }
        else {
            return response()->json([
                'message' => 'Esta cuenta ya ha sido activada.',
                'status' => 201
            ], 200);
        }
    }
}
