<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'serviceName' => $faker->name,
        'serviceDescription' => $faker->text,
        $services = array("Kaderníctvo/Barber", "Kozmetický salón", "Masáže", "Nechtové štúdium", "Sauna"),
        $serviceRand = array_rand($services),
        'serviceCategory' => $services[$serviceRand],
        $cities = array("Košice", "Bratislava"),
        $cityRand = array_rand($cities),
        'serviceCity' => $cities[$cityRand],
        'servicePrice' => $faker->randomNumber(2),
        'image' => "uploads/QnfctBbprV1utwFvpUE7AOfdZHgy6NZUNrH6JcEE.jpeg"
    ];
});
