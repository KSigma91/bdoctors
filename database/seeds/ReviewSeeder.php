<?php

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $myReview = 'Ottimo medico, serio, competente e gentile come pochi';

        $users_ids = User::all()->pluck('id');
        foreach ($users_ids as $user_id) {
            $nReviews = $faker->numberBetween(1, 10);
            for ($i=0; $i < $nReviews; $i++) {
                $review = new Review;
                $review->user_id = $user_id;
                // $review->review = implode($faker->paragraphs(3));
                $review->review = $myReview;
                $review->vote = $faker->numberBetween(1, 5);
                $review->date = $faker->dateTimeThisYear();
                $review->name = $faker->firstName();
                $review->save();
            }
        }
    }
}
