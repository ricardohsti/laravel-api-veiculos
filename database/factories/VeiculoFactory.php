<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Veiculo::class, function (Faker $fakerGen) {
	$faker = \Faker\Factory::create();
	$faker->addProvider(new \MattWells\Faker\Vehicle\Provider($fakerGen));

	$marca = $faker->vehicleMake;
	$modelo = $faker->vehicleModel($marca);

    return [
        'veiculo' => $modelo,
        'marca' => $marca,
        'ano' => $faker->year($max = 'now'),
        'descricao' => implode(" ", $faker->paragraphs),
        'vendido' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
