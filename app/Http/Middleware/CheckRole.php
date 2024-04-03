<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Verificar si el usuario tiene el rol adecuado
        if (!$request->user()->hasRole($rol)) {
            // Si el usuario no tiene el rol adecuado, puedes redirigirlo a una página de error o realizar otra acción
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
