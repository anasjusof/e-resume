<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles_id)
    {
        if(Auth::check()){ // check if the user is logged in

            if(Auth::user()->roles_id == $roles_id){ #If roles id matched, return next request
                return $next($request);
            }

            #If roles doesnt match, then redirect to user page based on roles
            if(Auth::user()->roles_id == 0){                // If roles id == 2, redirect to /dekan
              return redirect('/maklumatperibadi');
            }

            if(Auth::user()->roles_id == 1){                // If roles id == 2, redirect to /ketuajabatan
              return redirect('/senaraipensyarah');
            }
        }

        return redirect('/login');
    }
}
