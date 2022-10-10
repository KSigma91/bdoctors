<?php

use App\Models\User;
use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class SpecializationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all();
        $specializations = Specialization::all()->pluck('id');
        $nSpecializations = count($specializations);

        foreach ($users as $user) {
            $userSpecializations = $faker->randomElements($specializations, rand(1, $nSpecializations));
            foreach ($userSpecializations as $userSpecialization) {
                $user->specializations()->attach($userSpecialization);
            }
        }
    }
}
