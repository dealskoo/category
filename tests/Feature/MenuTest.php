<?php

namespace Dealskoo\Category\Tests\Feature;

use Dealskoo\Admin\Facades\AdminMenu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Dealskoo\Category\Tests\TestCase;


class MenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_menu()
    {
        $childs = AdminMenu::findBy('title', 'admin::admin.settings')->getChilds();
        $menu = collect($childs)->where('title', 'category::category.categories');
        $this->assertNotNull($menu);
    }
}
