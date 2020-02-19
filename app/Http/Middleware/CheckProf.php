<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;
use user;
use Closure;

class CheckProf
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
        $user=auth()->user();
        if($user!=Null){
            if ($user->can('isEtud')   ) {
                return redirect('404');
            }
        }else{
            return redirect('404');
        }
      
        return $next($request);
    }
}
