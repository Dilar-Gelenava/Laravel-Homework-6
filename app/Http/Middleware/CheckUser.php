<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CheckUser
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
        $product = Product::where("id", $request->input("id"))->firstOrFail();
        $user_id = $product["user_id"];
        if (Auth::user()->id == $user_id) {
            return $next($request);
        }

        return response('<h1>WTF are you trying to do man?</h1>');
        
    }
}
