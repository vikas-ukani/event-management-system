<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('Event Name');
            $table->text('description', 100)->comment('Event description');
            $table->timestamp("start_time")->comment('event start time');
            $table->timestamp("end_time")->comment('event end time');
            $table->string("day_of_the_week")->comment('Day of the Week ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
