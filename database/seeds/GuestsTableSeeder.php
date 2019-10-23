<?php

use Illuminate\Database\Seeder;

class GuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i<=50; $i++) {
            $gender = $faker->randomElement(['male', 'female']);
            $status = $faker->randomElement(['approved', 'pending']);

            
            DB::table('guests')
                ->insert([
                    'firstName' => $faker->firstName,
                    'lastName' => $faker->lastName,
                    'email' => $faker->email,
                    'postal' => $faker->postcode,
                    'instagram' => $faker->userName,
                    'gender' => $gender,
                    'company' => $faker->company,
                    'role' => $faker->jobTitle,
                    'status' => $status,
                ]);
        }
    }
}
