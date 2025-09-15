<?php

namespace Database\Seeders;

use App\Models\{User, Category, Tag};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         $this->call([
            // PermissionSeeder::class,
            // RoleSeeder::class,
            DefaultUserSeeder::class,
 
            // UsersTableSeeder::class,
            // BrandsTableSeeder::class,
            // CategoriesTableSeeder::class,
        ]);            

        // User::factory(10)->create();
        // Category::factory(20)->create();
        // Tag::factory(20)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
