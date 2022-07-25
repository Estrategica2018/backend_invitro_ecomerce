<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPassword\CreateForgotPasswordRequest;
use App\Http\Requests\ForgotPassword\FindForgotPasswordRequest;
use App\Http\Requests\ForgotPassword\ResetForgotPasswordRequest;
use App\Models\PasswordReset;
use App\Models\User;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    //
    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(CreateForgotPasswordRequest $request)
    {
        $user = User::where('email', $request['email'])->first();
        if (!$user) {
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'No se pudo encontrar un usuario con ese dirección de correo.'
            ], 404);
        }
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
            ]
        );
        $url = $request['origin'].'/'.$passwordReset->token;
        if ($user && $passwordReset) {
            $user->notify(  new PasswordResetRequest($url) );
            return response()->json([
                'overall_status' => 'successfull',
                'message' => 'Hemos enviado un correo electrónico con el enlace de restablecimiento de contraseña.!'
            ],200);
        }

        return response()->json([
            'overall_status' => 'unsuccessfull',
            'message' => 'Error enviando el correo electrónico .'
        ], 400);

    }

    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find(FindForgotPasswordRequest $request)
    {
        $passwordReset = PasswordReset::where('token', $request['token'])
            ->first();
        if (!$passwordReset)
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'Este token de restablecimiento de contraseña no es válido, por favor solicita de nuevo la recuperación de clave.'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            PasswordReset::where('token', $request['token'])->delete();
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'Este token de restablecimiento de contraseña ha caducado, por favor solicita de nuevo la recuperación de clave.'
            ], 404);
        }
        return response()->json([
            'overall_status' => 'successfull',
            'data' => [
                'passwordReset' => $passwordReset
            ]
        ],200);
    }

    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(ResetForgotPasswordRequest $request)
    {
        $passwordReset = PasswordReset::where([
            ['token', $request['token']],
            ['email', $request['email']]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'Este token de restablecimiento de contraseña no es válido.'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'No se puedo encontrar un usuario con esa dirección de correo.'
            ], 404);
        $user->password = Hash::make($request->password);
        $user->save();
        PasswordReset::where([
            ['token', $request['token']],
            ['email', $request['email']]
        ])->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));

        return response()->json([
            'overall_status' => 'successfull',
            'message' => 'Contraseña restablecida.',
            'data' => [
                'user' => $user
            ],
        ],200);
    }
}
