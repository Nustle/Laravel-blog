<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
                'image' => 'images/seeder.jpg',
                'title' => $faker->realText(50),
                'slug' => $slug,
                'tagline' => $faker->realText(30),
                'announce' => $faker->realText(300),
                'fulltext' => $faker->realText(1024),
                'views_count' => mt_rand(0, 100),
                'active_from' => Carbon::now()
            ]);

            $slug = $postModel->slug = str_slug($postModel->title, '-');
            $postModel->save();
        }

        $views_count = 0;

        foreach (Post::all() as $post) {
            if ($post->views_count > $views_count) {
                $views_count = $post->views_count;
            }
        }

        $favPost = Post::where('views_count', $views_count)
                        ->first();
        $favPost->is_favorite = 1;
        $favPost->save();
    }
}
