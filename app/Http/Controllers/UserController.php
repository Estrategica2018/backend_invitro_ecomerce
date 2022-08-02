<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;

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

    public function update(UpdateUserRequest $request)
    {
        $user = $user = auth()->user();
        if($user)
        {
            $fileName = null;
            $app_url = env('APP_URL', 'http://127.0.0.1:8000');

            if(isset($request['image']))
            {
                $image = $request['image']->getClientOriginalExtension();  // your base64 encoded

                //$extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];   // .jpg .png .pdf
                $extension = $request['image']->getClientOriginalExtension();
                $fileName = 'images_users/'. date('mdYHis') . uniqid() . '_user_' . $user->id .'.' .$extension;

                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace('data:image/jpeg;base64,', '', $image);
                $path = str_replace('\\\\', '/' , base_path());

                if(!Storage::exists($path.'/images_users')){
                    Storage::makeDirectory($path.'/images_users');
                }

                File::put($path . '/public/' . $fileName, base64_decode($image));

                $user->url_image = $app_url .'/'. $fileName;

            }

            if(isset($request['name'])) $user->name = $request['name'];
            if(isset($request['last_name'])) $user->last_name = $request['last_name'];
            if(isset($request['email'])) $user->email = $request['email'];
            if(isset($request['password'])) $user->password = Hash::make($request['password']);

            $user->save();

            return response()->json([
                'overall_status' => 'successfull',
                'message'        => 'Datos de usuario modificados',
                'data'           => [
                    'user' => $user
                ]
            ]);
        }

        return response()->json([
            'overall_status' => 'unsuccessfull',
            'message'        => 'La sesión ha caducado.'
        ], 403);
    }
}
