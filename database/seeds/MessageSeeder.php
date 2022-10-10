<?php

use App\Models\User;
use App\Models\Message;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $myMex = 'Buongiorno, volevo fissare un appuntamento, che giorno è disponibile?';

        $users_ids = User::all()->pluck('id');

        foreach ($users_ids as $user_id) {
            $nMessages = $faker->numberBetween(1, 10);
            for ($i=0; $i < $nMessages; $i++) { 
            $message = new Message();
            // $message->message = implode($faker->paragraphs(3));
            $message->message = $myMex;
            // $message->date = $faker->date('Y_m_d');
            $message->date = $faker->dateTimeThisYear();
            $message->email = $faker->freeEmail();
            $message->user_id = $user_id;
            $message->sender_receiver = "receiver";
            $message->save();
            }
        }
    }
}
