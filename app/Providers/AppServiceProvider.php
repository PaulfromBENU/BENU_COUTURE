<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Blade;

use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('youVarName', [1, 2, 3]);

        Password::defaults(function () {
            $rule = Password::min(8);

            // return $this->app->isProduction()
            //             ? $rule->mixedCase()->uncompromised()
            //             : $rule;
            return $rule->mixedCase();// ->uncompromised();
        });

        Filament::registerStyles([
            asset('css/app.css'),
        ]);

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Seller & Sales',
                'Users',
                'Creations & Variations',
                'Data Importation',
                'Site Data',
                'Shops & Partners',
            ]);
        });

        Blade::directive('inshop', function () {
            return "<?php if(auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'vendor' || auth()->user()->role == 'shop')): ?>";
        });

        Blade::directive('endinshop', function () {
            return "<?php endif ?>";
        });
    }
}
