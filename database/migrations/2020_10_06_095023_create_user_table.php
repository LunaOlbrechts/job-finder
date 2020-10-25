<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('internship_id')->nullable();
            $table->string('name');
            $table->string('email');//->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('age')->nullable();
            $table->string('portfolio')->nullable();
            $table->text('preference')->nullable();
            $table->text('tools')->nullable(); // =skills
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->binary('cv')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
            $table->rememberToken();

        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('students');
        Schema::dropIfExists('users');
    }
}
