<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
				'firstname' => $faker->firstName,
				'lastname'  => $faker->lastName,
				'email'     => $faker->email,
				'password'  => Hash::make('laravel'),
				'telephone' => $faker->phoneNumber,
			]);
		}
		User::create([
			'firstname' => $faker->firstName,
			'lastname'  => $faker->lastName,
			'email'     => $faker->email,
			'password'  => Hash::make('admin'),
			'telephone' => $faker->phoneNumber,
			'admin'     => 1,
		]);
	}

}
