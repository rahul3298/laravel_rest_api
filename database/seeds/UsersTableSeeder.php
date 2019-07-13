<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\User::class, 10)->create()->each(function($user) {
            $user->posts()->saveMany(factory(App\Model\Post::class,2)->make());

        // 3rd nest seeding
        $user->posts()->each(function($post){
            $post->comments()->saveMany(factory(App\Model\Comment::class, 2)->make());
        });
});
    }
}
