<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Саморазвитие',
            'slug' => Str::slug('Саморазвитие')
        ]);

        Category::create([
            'name' => 'Новости',
            'slug' => Str::slug('Новости')
        ]);

        Category::create([
            'name' => 'PHP',
            'slug' => Str::slug('PHP')
        ]);

        Category::create([
            'name' => 'JavaScript',
            'slug' => Str::slug('JavaScript')
        ]);

        Category::create([
            'name' => 'Игры',
            'slug' => Str::slug('Игры')
        ]);
    }
}
