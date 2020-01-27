<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Post::find($i)
                ->categories()
                ->sync([mt_rand(1, 5)]);
        }
    }
}
