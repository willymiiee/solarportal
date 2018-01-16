<?php

use App\Models\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $faker->paragraphs(rand(3, 6), true),
        'type' => $faker->randomElement(['page', 'post']),
        'is_home' => 0,
        'created_at' => $faker->dateTimeBetween('-1 years'),
        'updated_at' => $faker->dateTimeBetween('-1 years'),
    ];
});
