<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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

    public function boot()
    {
        Blade::directive('emp', function() {
            return "<?php if( Auth::check() && Auth::user()->rights == 'emp'): ?>";
        });
    
        Blade::directive('endemp', function() {
            return "<?php endif; ?>";
        });
        
        Blade::directive('adm', function() {
            return "<?php if( Auth::check() && Auth::user()->rights == 'adm'): ?>";
        });
    
        Blade::directive('endadm', function() {
            return "<?php endif; ?>";
        });
        
        Blade::directive('super', function() {
            return "<?php if( Auth::check() && Auth::user()->rights == 'super adm'): ?>";
        });
    
        Blade::directive('endsuper', function() {
            return "<?php endif; ?>";
        });
    }
}