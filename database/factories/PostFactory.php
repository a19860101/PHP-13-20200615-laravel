<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->realText(20,2),
        'content' => $faker->realText(500,2),
        'cover' => $faker->image('storage/app/public/images', 800, 600, 'cats', false)
    ];
});
