<?php
namespace Lrvl\TemplateApp;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class AppProvider extends ServiceProvider
{
    public $appName = "template";
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        include __DIR__.'/routes/web.php';
        $this->loadViewsFrom(__DIR__.'/resources/views', $this->appName);
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([__DIR__.'/public' => public_path('vendor/lrvl/' . $this->appName)], 'public');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $appSettings = json_decode(file_get_contents(__DIR__.'/app.json'), true);
        config(['apps.' . $this->appName => $appSettings]);
    }
}