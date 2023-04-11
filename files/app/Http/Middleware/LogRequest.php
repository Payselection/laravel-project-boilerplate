<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $data = ['url' => $request->url(), 'data' => $request->all()];
        if ($request->hasHeader('X-Site-Id')) {
            $data['headers'] = [
                'X-Site-Id' => $request->header('X-Site-Id'),
                'X-Webhook-Signature' => $request->header('X-Webhook-Signature'),
            ];
        }

        Log::debug(json_encode($data, 448));

        return $next($request);
    }
}
