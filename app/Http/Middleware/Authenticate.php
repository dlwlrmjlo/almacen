<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Verificar si la solicitud espera JSON (por ejemplo, una API)
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Usuario no autenticado.'], 401);
            }
        
            // Si es una solicitud normal, redirigir al login con un mensaje
            return redirect()->route('login')->withErrors(['auth' => 'Debe iniciar sesión para acceder a esta página.']);
        }
        
        return $next($request);
    }
}
