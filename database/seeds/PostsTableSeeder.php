<?php

use Illuminate\Database\Seeder,
    Carbon\Carbon;
use App\Models\Post;
use Faker\Factory;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');
        $needablePosts = 10;

        for ($i = 0; $i < $needablePosts; $i++) {
            $slug = '';

            $postModel = Post::create([
                'user_id' => mt_rand(1, 3),
                'image' => 'https://imgholder.ru/1280x720/0082d5/eceff4&text=Test%20text&font=kelson',
                'title' => $faker->realText(50),
                'slug' => $slug,
                'tagline' => $faker->realText(30),
                'announce' => $faker->realText(300),
                'fulltext' => $faker->realText(1024),
                'views_count' => mt_rand(0, 100),
                'comments_count' => mt_rand(0, 10),
                'active_from' => Carbon::now()
            ]);

            $slug = $postModel->slug = str_slug($postModel->title, '-');
            $postModel->save();
        }

        $favPost = Post::find(mt_rand(1, 10));
        $favPost->is_favorite = 1;
        $favPost->save();
    }
}
