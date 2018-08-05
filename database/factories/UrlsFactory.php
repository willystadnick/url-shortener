<?php

use Faker\Generator as Faker;

$factory->define(App\Url::class, function (Faker $faker) {
    return [
        'hash' => $faker->regexify('[0-9a-zA-Z]{16}'),
        'url' => $faker->url,
    ];
});
