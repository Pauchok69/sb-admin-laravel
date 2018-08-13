<?php

namespace App\Http\Middleware;

use App\Role;
use App\User;
use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$permissions)
    {
//        $roles = Role::all();
////        dd($permissions);
////        echo $request->user()->role->name;
//        if (!in_array($request->user()->role->name, $permissions)) {
//            return abort(401, 'This action is unauthorized.');
//        }
//
//        return $next($request);
    }
}
