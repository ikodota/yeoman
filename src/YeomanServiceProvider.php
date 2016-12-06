<?php

namespace Ikodota\Yeoman;

use Illuminate\Support\ServiceProvider;
//use Ikodota\Yeoman\Facades\Yeoman as YeomanFacade;

/**
 * This is the owen auditing service provider class.
 */
class YeomanServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publish();
        //$this->mergeConfigFrom(__DIR__.'../config/yeoman.php', 'yeoman');
        //$this->loadMigrationsFrom(__DIR__.'/../databases/migrations');
        //$this->loadViewsFrom(__DIR__.'/../resources/views', 'yeoman');
        //$this->loadTranslationsFrom(__DIR__.'../resources/lang', 'yeoman');

        //路由
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }
    }

    public function publish()
    {
        //发布配置文件
        $this->publishes([
            __DIR__.'/../config/' => config_path('/'),
        ],'config');

        //发布迁移文件
        $this->publishes([
            __DIR__.'/../databases/migrations/' => database_path('/migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../databases/seeds/' => database_path('/seeds'),
        ], 'seeds');

        /*//发布控制器/中间件和Request
        $this->publishes([
            __DIR__.'/Http/' => app_path('/Http/'),
        ],'http');

        //发布Models
        $this->publishes([
            __DIR__.'/Models/' => app_path('/Models/'),
        ],'models');

        //发布视图文件
        $this->publishes([
            __DIR__.'/../resources/views/' => resource_path('views'),
        ],'views');

        //发布Providers
        $this->publishes([
            __DIR__.'/Providers/' => app_path('/Providers/'),
        ],'Providers');

        //发布语言包
        $this->publishes([
            __DIR__.'/../resources/lang/' => resource_path('lang'),
        ],'translation');

        //发布资源文件
        $this->publishes([
            __DIR__.'/../assets/' => public_path('/'),
        ], 'public');*/
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

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
