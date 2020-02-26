<?php

namespace App\Http\Middleware;

use Closure;

class Cors{
    public function handle($request, Closure $next)
        {
            /* @var $response Response 
            $response = $next($request);
            if (!$request->isMethod('OPTIONS')) {
                return $response;
            }
            $allow = $response->headers->get('Allow'); // true list of allowed methods
            if (!$allow) {
                return $response;
            }
            $headers = [
                'Access-Control-Allow-Methods' => $allow,
                'Access-Control-Max-Age' => 3600,
                'Access-Control-Allow-Headers' => 'X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept',
            ];
            return $response->withHeaders($headers);*/
            return $next($request)
              ->header('Access-Control-Allow-Origin', '*')
              ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }
}
