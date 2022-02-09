<?php

namespace Dealskoo\Category\Tests\Unit\Models;

use Dealskoo\Category\Models\Category;
use Dealskoo\Category\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_country()
    {
        $category = Category::factory()->create();
        $this->assertNotNull($category->country);
    }

    public function test_slug()
    {
        $slug = 'Hello';
        $category = Category::factory()->create();
        $category->slug = $slug;
        $category->save();
        $this->assertEquals($category->slug, Str::lower($slug));
    }

    public function test_parent()
    {
        $category = Category::factory()->create();
        $category1 = Category::factory()->create([
            'parent_id' => $category->id
        ]);
        $this->assertEquals($category1->parent->name, $category->name);
    }

    public function test_children()
    {
        $category = Category::factory()->create();
        $category1 = Category::factory()->create([
            'parent_id' => $category->id
        ]);
        $this->assertCount(1, $category->children);
    }
}
