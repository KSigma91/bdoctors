<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorshipUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsorship_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('sponsorship_id')->constrained();
            $table->dateTime('starting_date');
            $table->dateTime('ending_date');
            $table->string('id_paymant', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsorship_user');
    }
}
