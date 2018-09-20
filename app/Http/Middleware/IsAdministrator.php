<?php
 namespace App\Http\Middleware;
 use Closure;
 use App\User;

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
         if (Auth::check())
        {
            $User = Auth::User();
            
            if ($User->user_type == 1  )
            
                return $next($request);
            
            else
                  return redirect()->route('trang-chu');
        }else    
                
                return redirect()->route('trang-chu');
    }      
        
}