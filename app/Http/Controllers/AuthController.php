<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Models\ConfirmAccount;
use App\Models\Role;
use App\Models\User;
use App\Notifications\SuccessfullRegistration;
use Illuminate\Support\Facades\Notification;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginAuthRequest $request)
    {
        if (! $token = auth()->attempt($request->all())) {
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'Credenciales no validas'
            ], 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json([
        'overall_status' => 'successfull',
         'data' => [
             'usuario' => auth()->user()
         ]
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'overall_status' => 'successfull',
            'message' => 'Cerrar sesión con éxito'
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'overall_status' => 'successfull',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(RegisterAuthRequest $request)
    {
        $confirmAccount = ConfirmAccount::where([
            ['email','=',$request['email']],
            ['code','=',$request['code']],
        ])->first();

        if(!$confirmAccount)
        {
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => '¡Código de confirmación de cuenta no existe!',

            ],400);
        }

        if (!Role::find($request['role']))
        {
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => '¡Role no existe!',
            ],400);
        }

        $user = User::create(array_merge(
            $request->all(),
            ['password' => bcrypt($request->password)]
        ));
        $user->roles()->attach($request->role);

        $confirmAccount->delete();

        try{
            Notification::route('mail', $request['email'])
                ->notify(new SuccessfullRegistration());

        }
        catch (\Exception $e){
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'Usuario creado, error enviando el correo electrónico .'.' '.$e
            ], 403);
        }

        return response()->json([
            'overall_status' => 'successfull',
            'message' => '¡Usuario registrado exitosamente!',
            'data' => [
                'user' => $user,
                'user_role' => $user->roles()->get()
            ]
        ],201);
    }
}
