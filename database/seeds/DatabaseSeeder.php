<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(SpecializationUserSeeder::class);
        $this->call(SponsorshipSeeder::class);
        $this->call(SponsorshipUserSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
