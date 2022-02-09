<?php

namespace Dealskoo\Category\Tests\Feature;

use Dealskoo\Admin\Facades\PermissionManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Dealskoo\Category\Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions()
    {
        $this->assertNotNull(PermissionManager::getPermission('categories.index'));
        $this->assertNotNull(PermissionManager::getPermission('categories.show'));
        $this->assertNotNull(PermissionManager::getPermission('categories.create'));
        $this->assertNotNull(PermissionManager::getPermission('categories.edit'));
        $this->assertNotNull(PermissionManager::getPermission('categories.destroy'));
    }
}
