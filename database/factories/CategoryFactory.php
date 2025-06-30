<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Database\Factories\Faker\CategoryNameProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new CategoryNameProvider($this->faker));

        $name = $this->faker->categoryName();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
