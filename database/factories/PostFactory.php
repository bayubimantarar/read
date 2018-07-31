<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => 'Learning Laravel',
        'slug' => 'learning-laravel',
        'body' => 'Learning Laravel is very easy!'
    ];
});
