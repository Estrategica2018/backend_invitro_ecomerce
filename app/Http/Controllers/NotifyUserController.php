<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotifyUserRequest\ConfirmEmailNotifyUserRequest;
use App\Http\Requests\NotifyUserRequest\ValidateConfirmEmailRequest;
use App\Models\ConfirmAccount;
use App\Notifications\AccountRegistration;
use Illuminate\Support\Facades\Notification;

class NotifyUserController extends Controller
{
    //
    public function register_and_get_code ($request)
    {
        $array_code = [];
        $code = '123456789';
        $code = substr(str_shuffle($code), 0, 6); // Randomly shuffles a string
        ConfirmAccount::updateOrCreate(
            ['email' => $request['email']],
            ['code'  => $code]
        );
        while($code != 0){ // array de codigo de 6 digitos
            $array_code[] = $code % 10;
            $code = intval($code/10);
        }
        return $array_code;
    }

    public function confirm_email(ConfirmEmailNotifyUserRequest $request)
    {
        $array_code = $this->register_and_get_code($request);
        $url = $request['origin'].'/'.$request['email'];
        try{
            Notification::route('mail', $request['email'])
                ->notify(new AccountRegistration($array_code,$url));
        }catch (\Exception $e){
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'Error enviando el correo electrónico .'.' '.$e
            ], 400);
        }
        return response()->json([
            'overall_status' => 'successfull',
            'message' => 'Hemos enviado un correo electrónico'
        ],201);
    }

    public function validate_confirm_email(ValidateConfirmEmailRequest $request)
    {
        $confirm_account = ConfirmAccount::where([
            ['email',$request['email']],
        ])->first();

        if($confirm_account){
            if($confirm_account->code == $request['code']){
                if( $confirm_account->total_minutes_diff() > 15 ){
                    return response()->json([
                        'overall_status' => 'unsuccessfull',
                        'message' => 'Error el código expiró, solicite otro código.'
                    ], 200);
                }
                return response()->json([
                    'overall_status' => 'unsuccessfull',
                    'message' => 'Código validado exitósamente'
                ],200);

            }
            return response()->json([
                'overall_status' => 'unsuccessfull',
                'message' => 'Código incorrecto.',
                'data' => [
                    'code' => $request['code']
                ]
            ],200);
        }

        return response()->json([
            'overall_status' => 'successfull',
            'message' => 'Error no se encontró el correo.',
            'data' => [
                'email' => $request['email']
            ]
        ],200);
    }
}
