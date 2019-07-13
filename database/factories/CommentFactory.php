<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Comment::class, function (Faker $faker) {
    return [
        //'post_id' => $faker->numberBetween(1, 100),
        'body' => $faker->text(200),
        'user_id' => $faker->numberBetween(1, 50)
    ];
});
