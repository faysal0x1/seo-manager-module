<?php

namespace App\Modules\SeoManager\Providers;

use App\Modules\SeoManager\Models\SeoEntry;
use App\Modules\SeoManager\Repositories\SeoEntryRepository;
use App\Modules\SeoManager\Services\SeoManager;
use Illuminate\Support\ServiceProvider;

class SeoManagerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SeoEntryRepository::class, fn () => new SeoEntryRepository(new SeoEntry()));
        $this->app->alias(SeoEntryRepository::class, 'modules.seo-manager.repository');

        $this->app->singleton(SeoManager::class, function ($app) {
            return new SeoManager($app->make(SeoEntryRepository::class));
        });
    }

    public function boot(): void
    {
        $modulePath = __DIR__ . '/..';

        $this->loadMigrationsFrom($modulePath . '/database/migrations');
        $this->loadRoutesFrom($modulePath . '/routes/admin.php');

        $this->publishes([
            $modulePath . '/resources/js/pages/seomanager' => resource_path('js/pages/seomanager'),
        ], 'seo-manager-views');
    }
}


