<?php

namespace App\Http\Middleware;

use Closure;
use ErrorException;
use App\Helper\JWTTOKEN;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\UnauthorizedException;

class VerifyTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $token=$request->cookie('Token');
        $result=JWTTOKEN::Decoder($token);
        if($result=="unauthorized"){
             return redirect('/Login');
           }
        else{
            $request->headers->set('email',$result->email);
            $request->headers->set('id',$result->id);
            return $next($request);
        }
        
    }
}
