<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
   
public function handle($request, Closure $next)
{
    $roleId = session()->get('roleId');

        // Check if the user is logged in and the role is not 1
        if ($request->user() && $roleId != 1) {
            return redirect('/');
        }
return $next($request);

}
}
