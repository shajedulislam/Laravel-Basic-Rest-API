<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetprofileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petprofile', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('user_id', 199)->nullable();
            $table->string('pet_id', 199)->nullable();
            $table->string('type', 199)->nullable();
            $table->string('name', 199)->nullable();
            $table->string('gender', 199)->nullable();
            $table->string('breed', 199)->nullable();
            $table->string('birthday', 199)->nullable();
            $table->boolean('neutered_spayed')->nullable();
            $table->string('color', 199)->nullable();
            $table->string('notes', 199)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petprofile');
    }
}
