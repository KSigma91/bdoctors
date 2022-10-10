<?php

use App\Models\User;
use App\Models\Sponsorship;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class SponsorshipUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $users = User::all()->where('id', '<', 5);
        $sponsorships = Sponsorship::all();
        $nSponsorships = count($sponsorships);

        foreach ($users as $user) {
            $sponsorship = $faker->randomElement($sponsorships, rand(0, $nSponsorships));
            $date = date('Y-m-d H:i:s');
            $date_add = date("Y-m-d H:i:s", strtotime('+' . $sponsorship->time . 'hours'));
            $attach_data[1] = [
                'sponsorship_id' => $sponsorship->id,
                'starting_date' => $date,
                'ending_date' => $date_add,
                'id_paymant' => 1
            ];
            $user->sponsorships()->attach($attach_data);
        }
    }
}
