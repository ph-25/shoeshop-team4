<?php
 namespace App\Http\Middleware;
 use Closure;

use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Illuminate\Support\Facades\Auth;

 class IsAdministrator
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
        if(Auth::guard('admins')->check())
        {
            if(Auth::guard('admins')->users()->user_type == 0){
               
                return redirect('login');
            }
        }else{
            return redirect('dangnhap');
        }
         return $next($request);
    }
}