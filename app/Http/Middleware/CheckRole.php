<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (collect($request->user()->role)->contains($role)) {
            return $next($request);
        }
        if ($request->expectsJson())
            return response()->json([], 403);
        abort(403, 'You cant do that');

    }
}
