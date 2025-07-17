<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Izinkan jika user adalah admin (termasuk super_admin karena isSuperAdmin() adalah subset dari is Admin jika Anda mau)
        // Atau: Auth::user()->role === 'admin' || Auth::user()->role === 'super_admin'
        if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isSuperAdmin())) { // Menggunakan helper methods
            return $next($request);
        }

        // Jika bukan Admin (atau Super Admin), redirect atau abort
        return abort(403, 'Unauthorized. You do not have admin access.');
    }
}
