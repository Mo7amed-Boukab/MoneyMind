<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AccesToAdminDashbord
{
    public function handle(Request $request, Closure $next)
    {
        if (Gate::denies('access-admin-dashbord')) {
            abort(403, "Vous n'avez pas l'accès à cette page");
        }

        return $next($request);
    }
}
