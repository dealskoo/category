<?php

namespace Dealskoo\Category\Tests\Feature\Admin;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Category\Models\Category;
use Dealskoo\Category\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.categories.index'));
        $response->assertStatus(200);
    }

    public function test_table()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.categories.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $response->assertJsonPath('recordsTotal', 0);
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $admin = Admin::factory()->isOwner()->create();
        $category = Category::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.categories.show', $category));
        $response->assertStatus(200);
    }

    public function test_create()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.categories.create'));
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $admin = Admin::factory()->isOwner()->create();
        $category = Category::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.categories.store'), $category->only([
            'name',
            'slug',
            'country_id',
            'index',
            'parent_id'
        ]));
        $response->assertStatus(302);
    }

    public function test_edit()
    {
        $admin = Admin::factory()->isOwner()->create();
        $category = Category::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.categories.edit', $category));
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $admin = Admin::factory()->isOwner()->create();
        $category = Category::factory()->create();
        $category1 = Category::factory()->make();
        $response = $this->actingAs($admin, 'admin')->put(route('admin.categories.update', $category), $category1->only([
            'name',
            'country_id',
            'index',
            'parent_id'
        ]));
        $response->assertStatus(302);
    }

    public function test_destroy()
    {
        $admin = Admin::factory()->isOwner()->create();
        $category = Category::factory()->create();
        $response = $this->actingAs($admin, 'admin')->delete(route('admin.categories.destroy', $category));
        $response->assertStatus(200);
        $this->assertSoftDeleted($category);
    }
}
