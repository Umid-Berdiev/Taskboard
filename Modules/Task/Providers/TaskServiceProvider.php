<?php

namespace Modules\Task\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Task\Services\TaskboardService;
use Modules\Task\Services\TaskService;

class TaskServiceProvider extends ServiceProvider
{
    protected $commands = [
        \Modules\Task\Commands\Install::class,
    ];
    
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Task', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->app->singleton(TaskboardService::class, function () {
            return new TaskboardService();
        });

        $this->app->singleton(TaskService::class, function () {
            return new TaskService();
        });

        $this->app->alias(TaskboardService::class, 'taskboard');
        $this->app->alias(TaskService::class, 'task');

        $this->commands($this->commands);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/task');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'task');
        } else {
            $this->loadTranslationsFrom(module_path('Task', 'Resources/lang'), 'task');
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Task', 'Config/config.php') => config_path('task.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Task', 'Config/config.php'), 'task'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/task');

        $sourcePath = module_path('Task', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/task';
        }, \Config::get('view.paths')), [$sourcePath]), 'task');
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Task', 'Database/factories'));
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
