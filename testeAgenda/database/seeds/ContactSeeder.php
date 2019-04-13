<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      for ($i = 1; $i <= 300; $i++) {
          DB::table('contacts')->insert(['name'=>"{$faker->userName}", 'cpf'=>'98765432111', 'birthdate'=>'1990-05-12', 'email' => "$faker->email", 'photo' => '']);
      }
    }
}
