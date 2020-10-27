<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Manager;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Manager::class, function (Faker $faker) {
    return [
        'name' => 'Manager',
        'email' => 'manager@manager.com',
        'number' => '123-123-1234',
        'password' => Hash::make('password'),
    ];
});
