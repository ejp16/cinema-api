<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoleUser;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('api')->user();

        #Get user roles and put them into an array
        $roles = RoleUser::where('user_id', $user->id)->pluck('role_id')->toArray();

        #Check if the user has role number 3 which is Manager's ID role
        if ( ! in_array(3, $roles) ) {
            return response()->json(['error' => 'No autorizado'], 403);
        }
            
            return $next($request);
    }
}
