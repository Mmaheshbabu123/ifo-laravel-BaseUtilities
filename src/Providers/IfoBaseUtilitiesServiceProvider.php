<?php

namespace Packages\IfoBaseUtilities\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Facade;
class IfoBaseUtilitiesServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/app.php', 'app'
        );
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->singleton('abstractApiService', function () {
            return new \Packages\IfoBaseUtilities\Http\Services\AbstractApiService();
        });

        $this->app->singleton('abstractModel', function () {
            return new \Packages\IfoBaseUtilities\Http\Services\AbstractModel();
        });

        $this->app->singleton('baseValidator', function () {
            return new \Packages\IfoBaseUtilities\Http\Services\BaseValidator();
        });

        $this->app->singleton('decryptRequest', function () {
            return new \Packages\IfoBaseUtilities\Http\Services\DecryptRequest();
        });

        $this->app->singleton('encryptResponse', function () {
            return new \Packages\IfoBaseUtilities\Http\Services\EncryptResponse();
        });

        $this->app->singleton('hasNotDeletedScope', function () {
            return new \Packages\IfoBaseUtilities\Http\Services\HasNotDeletedScope();
        });

        $this->app->singleton('responseService', function () {
            return new \Packages\IfoBaseUtilities\Http\Services\Response();
        });
    }




    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
