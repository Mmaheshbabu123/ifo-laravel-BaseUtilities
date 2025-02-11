<?php

namespace Packages\IfoBaseUtilities\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Facade;
class IfoBaseUtilitiesServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/app.php' => config_path('ifo_base_utilities.php'),
        ], 'config');
    }
       
       
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->mergeConfigFrom(
            __DIR__.'/../config/app.php', 'ifo_base_utilities'
        );
        
        $this->registerServices();
        $this->registerAliases();
       
    }


    protected function registerAliases()
    {
        $aliases = config('ifo_base_utilities.aliases', []);
        if (!empty($aliases)) {
            $loader = AliasLoader::getInstance();

            foreach ($aliases as $alias => $class) {
                $loader->alias($alias, $class);
            }
        }
    }
    protected function registerServices()
    {
        $services = [
            'abstractApiService' => \Packages\IfoBaseUtilities\Http\Services\AbstractApiService::class,
            'abstractModel' => \Packages\IfoBaseUtilities\Http\Services\AbstractModel::class,
            'baseValidator' => \Packages\IfoBaseUtilities\Http\Services\BaseValidator::class,
            'decryptRequest' => \Packages\IfoBaseUtilities\Http\Services\DecryptRequest::class,
            'encryptResponse' => \Packages\IfoBaseUtilities\Http\Services\EncryptResponse::class,
            'hasNotDeletedScope' => \Packages\IfoBaseUtilities\Http\Services\HasNotDeletedScope::class,
            'responseService' => \Packages\IfoBaseUtilities\Http\Services\Response::class,
        ];
    
        foreach ($services as $key => $class) {
            $this->app->bind($key, function () use ($class) {
                return new $class;
            });
        }
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
