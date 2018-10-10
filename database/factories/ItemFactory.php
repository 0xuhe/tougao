<?php

use Faker\Generator as Faker;

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'name' => $faker->name,
        'age' => $faker->numberBetween(5, 15),
        'school' => $faker->address,
        'birthday' => $faker->date(),
        'class' => $faker->numberBetween(1, 9),
        'teacher' => $faker->name,
        'teacher_phone' => $faker->phoneNumber,
        'teacher_email' => $faker->email,
        'parents' => $faker->name,
        'parents_phone' => $faker->phoneNumber,
        'group' => $faker->words(3, true),
        'thought' => $faker->paragraph,
        'note' => $faker->paragraph
    ];
});
