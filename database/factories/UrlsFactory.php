<?php

use Faker\Generator as Faker;

$factory->define(App\Url::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'hash' => $faker->regexify('[0-9a-zA-Z]{16}'),
        'pass' => $faker->regexify('[0-9a-zA-Z]{16}'),
    ];
});
