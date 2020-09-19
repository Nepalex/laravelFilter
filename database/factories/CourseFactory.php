<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Course::class, function (Faker $faker) {

    $name = $faker->sentence(rand(3, 8), true);

    $slug = str_slug(mb_strtolower($name ));

    $difficulty = ['beginner', 'intermediate', 'advanced'];
    $type = ['theory','project', 'snippet'];

    $data = [
        'name' => $name,
        'slug' => $slug,
        'free' => rand(0, 1),
        'difficulty' => $difficulty[rand(0, 2)],
        'type' => $type[rand(0, 2)],
    ];

    return $data;
});
