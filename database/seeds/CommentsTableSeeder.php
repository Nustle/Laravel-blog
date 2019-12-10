<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'post_id' => mt_rand(1, 10),
            'author' => 'admin',
            'text' => 'Unbelievable!!!',
            'likes_count' => mt_rand(0, 50)
        ]);

        Comment::create([
            'post_id' => mt_rand(1, 10),
            'author' => 'admin',
            'text' => 'Great! I agree with your opinion.',
            'likes_count' => mt_rand(0, 50)
        ]);

        Comment::create([
            'post_id' => mt_rand(1, 10),
            'author' => 'Dima',
            'text' => 'Oh. shit, here we go again...',
            'likes_count' => mt_rand(0, 50)
        ]);

        Comment::create([
            'post_id' => mt_rand(1, 10),
            'author' => 'Deni',
            'text' => 'Keep calm and love Audi!',
            'likes_count' => mt_rand(0, 50)
        ]);
    }
}
