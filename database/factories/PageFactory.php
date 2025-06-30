<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Database\Factories\Faker\PageTitleProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new PageTitleProvider($this->faker));

        $title = $this->faker->pageTitle();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraphs(3, true),
            'status' => 'active',
        ];
    }
}
