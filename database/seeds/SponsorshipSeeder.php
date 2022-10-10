<?php

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'price' => 2.99,
                'time' => 24
            ],
            [
                'price' => 5.99,
                'time' => 72
            ],
            [
                'price' => 9.99,
                'time' => 144
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            Sponsorship::create($sponsorship);
        }
    }
}
