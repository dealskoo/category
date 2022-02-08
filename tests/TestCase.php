<?php

namespace Dealskoo\Category\Tests;

use Dealskoo\Category\Providers\CategoryServiceProvider;

abstract class TestCase extends \Dealskoo\Admin\Tests\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            CategoryServiceProvider::class
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
