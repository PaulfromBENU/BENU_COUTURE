<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->isMethod('post')) {
            //Get first segment. Should be locale.
            $segment = $request->segment(1);

            // Prefixes the request with the locale if not present
            if (!in_array($segment, config('app.locales'))) {
                $segments = $request->segments();
                $fallback = session('locale') ?: config('app.fallback_locale');
                $segments = array_merge([$fallback], $segments);

                return redirect()->to(implode('/', $segments));
            }

            //Changes the locale to the prefixed value
            app()->setLocale($segment);
        }
        session(['locale' => app()->getLocale()]);

        return $next($request);
    }
}
