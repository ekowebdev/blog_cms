<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Database\Factories\Faker\PostTitleProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new PostTitleProvider($this->faker));

        $title = $this->faker->postTitle();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => $this->faker->text(100),
            'content' => $this->faker->paragraphs(3, true),
            'image' => null,
            'status' => 'published',
            'published_at' => now()->subDays($this->faker->numberBetween(0, 30)),
        ];
    }
}
