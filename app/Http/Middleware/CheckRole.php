<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'message' => 'La sesión ha caducado.'
            ], 411);
        }

        if(! $user->hasAnyRole(explode("|", $role))) {
            return response()->json([
                'message' => 'No tienes autorización para ingresar.'
            ], 403);
        }

        return response()->json(
            $next($request)->original
            , 200);
    }
}
