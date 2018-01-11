<?php

use App\Models\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    $name = $faker->company;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'email' => $faker->unique()->safeEmail,
        'domicile' => $faker->randomElement(['JAWA TIMUR', 'KALIMANTAN BARAT', 'LAMPUNG']),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'phone_2' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'description' => $faker->paragraph(rand(2, 5)),
    ];
});
