<?php

namespace Database\Factories\Dealskoo\Category\Models;

use Dealskoo\Category\Models\Category;
use Dealskoo\Country\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->unique()->slug(),
            'name' => $this->faker->name(),
            'country_id' => Country::factory(),
            'index' => $this->faker->numberBetween(0, 10),
            'parent_id' => $this->faker->numberBetween(0, 10),
        ];
    }
}
