<?php

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name' => 'Общее',
            'slug' => str_slug('Общее', '-')
        ]);

        Section::create([
            'name' => 'Разработка',
            'slug' => str_slug('Разработка', '-')
        ]);

        Section::create([
            'name' => 'Новости',
            'slug' => str_slug('Новости', '-')
        ]);

        Section::create([
            'name' => 'PHP',
            'slug' => str_slug('PHP', '-')
        ]);

        Section::create([
            'name' => 'Про жизнь',
            'slug' => str_slug('Про жизнь', '-')
        ]);
    }
}
