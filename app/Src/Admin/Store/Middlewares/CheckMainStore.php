<?php

namespace App\Src\Admin\Store\Middlewares;

use App\Domains\Stores\Models\Store;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMainStore
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $storeId = $request->header('X-Store-Id');
        if (! ($storeId && Store::find($storeId))) {
            $storeId = Store::where('is_main', true)->first()?->id;
        }
        session(['current_store' => $storeId]);

        return $next($request);
    }
}
