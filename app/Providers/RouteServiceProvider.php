<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';
        

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(300)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'auth', 'role:director'])
                ->prefix('director')
                ->as('director.')
                ->group(base_path('routes/director.php'));


            Route::middleware(['web', 'auth', 'role:coordinador'])
                ->prefix('coordinador')
                ->as('coordinador.')
                ->group(base_path('routes/coordinador.php'));


            Route::middleware(['web', 'auth', 'role:productor'])
                ->prefix('productor')
                ->as('productor.')
                ->group(base_path('routes/productor.php'));


            Route::middleware(['web', 'auth', 'role:locutor'])
                ->prefix('locutor')
                ->as('locutor.')
                ->group(base_path('routes/locutor.php'));
        });
    }
}
