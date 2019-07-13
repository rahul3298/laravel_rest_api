<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Post::class, function (Faker $faker) {
    return [
        'post_title' => $faker->sentence(6),
        'post_slug' => $faker->slug(7),
        'post_description' => $faker->text(200),
        'user_id' => $faker->numberBetween(1, 50)
    ];
});
