<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('uri');
            $table->string('name');
            $table->string('alternative-fr');
            $table->string('alternative-nl');
            $table->string('alternative-de');
            $table->string('alternative-en');
            $table->string('country-code');
            $table->double('longitude');
            $table->double('latitude');
            $table->double('avg_stop_times');
            $table->integer('official_transfer_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trains');
    }
}