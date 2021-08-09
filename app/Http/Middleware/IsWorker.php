<?php

namespace App\Http\Middleware;
 
use Closure;
class IsWorker
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
        if (auth()->user()->type =='customer') {
            return $next ($request);
        }
        return redirect('/home')->with('error',"You don't have admin access.");
    }
    
}
