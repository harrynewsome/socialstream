<?php

namespace JoelButcher\Socialstream\Http\Middleware;

use Inertia\Inertia;
use JoelButcher\Socialstream\Socialstream;

class ShareInertiaData
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  callable  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        Inertia::share(array_filter([
            'socialstream' => function () use ($request) {
                return [
                    'show' => Socialstream::show(),
                    'providers' => Socialstream::providers(),
                    'hasPassword' => ! is_null($request->user()->password),
                    'connectedAccounts' => $request->user()->connectedAccounts,
                ];
            },
        ]));

        return $next($request);
    }
}
