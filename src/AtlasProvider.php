<?php
namespace Mariojgt\Atlas;

use Illuminate\Support\ServiceProvider;
use Mariojgt\Atlas\Events\UserVerifyEvent;
use Mariojgt\Atlas\Listeners\SendUserVerifyListener;
use Illuminate\Support\Facades\Event;

class AtlasProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load atlas views
        $this->loadViewsFrom(__DIR__.'/views', 'atlas');
        // Load atlas routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publish();
    }

    public function publish()
    {
        // Publish the npm case we need to do soem developent
        // $this->publishes([
        //     __DIR__.'/../Publish/Npm/' => base_path()
        // ]);
    }
}
