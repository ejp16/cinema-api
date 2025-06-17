<?php

namespace App\Http\Middleware;

use App\Models\RoleUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Log;
class EmployeeMiddleware
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

        #Check if the user has role number 2 which is Employee's ID role
        if ( ! in_array(2, $roles)) {
            return response()->json(['error' => 'No autorizado'], 403);
        }
            
            return $next($request);

        
    }
}
