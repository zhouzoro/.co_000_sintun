<?php

namespace App\Http\Middleware;
use Log;
use Closure;

class LangMiddleware
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
        $dupRequest = $request->duplicate();
        $segment = $dupRequest->segment(1);
        if($segment=='en'){
            $request->merge([
                'lang' => 'en'
            ]);
            $request->server->set('REQUEST_URI',str_replace($segment,'',$dupRequest->path()));
        }else{
            $request->merge([
                'lang' => 'zh'
            ]);
        };
        $response = $next($request);
        return $response;
    }
}
