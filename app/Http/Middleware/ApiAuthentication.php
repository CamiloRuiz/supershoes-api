<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Basic Auth
        if (($request->getUser() === 'my_user') && ($request->getPassword() === 'my_password')) {

            // Validate store param and if is numeric
            if (($request->route('store') !== null) && !is_numeric($request->route('store'))) {
                return response()->json([
                    'success' => false,
                    'error_code' => 400,
                    'error_msg' => 'Bad request'
                ], 400);
            }

            return $next($request);
        }

        return response()->json([
            'success' => false,
            'error_code' => 401,
            'error_msg' => 'Not authorized'
        ], 401);
    }
}
