<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            TagsTableSeeder::class,
            CommentsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            CategoriesTableSeeder::class,
            PostsCategoriesTableSeeder::class,
            PostsTagsTableSeeder::class
        ]);
    }
}
