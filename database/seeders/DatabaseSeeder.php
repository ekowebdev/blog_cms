<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PageSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CategoryPostSeeder;
use Database\Seeders\RolePermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RolePermissionSeeder::class,
            PageSeeder::class,
            PostSeeder::class,
            CategorySeeder::class,
            CategoryPostSeeder::class,
        ]);
    }
}
