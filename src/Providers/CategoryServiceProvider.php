<?php

namespace Dealskoo\Category\Providers;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Permission;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([
                __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/category')
            ], 'lang');
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/admin.php');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'category');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'category');

        AdminMenu::whereTitle('admin::admin.settings', function ($menu) {
            $menu->route('admin.categories.index', 'category::category.categories', [], ['permission' => 'categories.index']);
        });

        PermissionManager::add(new Permission('categories.index', 'Categories List'), 'admin.settings');
        PermissionManager::add(new Permission('categories.show', 'View Category'), 'categories.index');
        PermissionManager::add(new Permission('categories.create', 'Create Category'), 'categories.index');
        PermissionManager::add(new Permission('categories.edit', 'Edit Category'), 'categories.index');
        PermissionManager::add(new Permission('categories.destroy', 'Destroy Category'), 'categories.index');
    }
}
