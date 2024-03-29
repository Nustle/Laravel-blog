<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Саморазвитие'
        ]);

        Tag::create([
            'name' => 'Разработка'
        ]);

        Tag::create([
            'name' => 'Новости'
        ]);

        Tag::create([
            'name' => 'Из жизни'
        ]);

        Tag::create([
            'name' => 'Обо всем'
        ]);
    }
}
