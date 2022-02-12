<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Redirect;
use App\User;

class RouteCheck
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
        $url=$request->path();
         
        $user_routes=array('order','order/create','');
        $merchant_routes=array('merchanthome');
        
        
        //Checks the routes to ensure that users access only authorised code
        //It has routes for both merchants and customers 
      if((Auth::user()->cust_flag == 1 ) ){
            
                return $next($request);
            
        }else if(Auth::user()->merchant_flag == 1){
            
                return $next($request);
             
        }
        else {
            return $next($request);
        }
         
    }

    // return $next($request);
}

