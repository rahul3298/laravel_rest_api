<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Post::class, 50)->create()->each(function ($post) {
            $post->comments()->save(factory(App\Model\Comment::class)->make());
        });
    }
}
