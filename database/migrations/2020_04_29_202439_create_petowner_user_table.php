<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetownerUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petowner_user', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('user_id', 199)->nullable();
            $table->string('email', 199)->nullable();
            $table->string('mobile_number', 199)->nullable();
            $table->string('password', 199)->nullable();
            $table->string('first_name', 199)->nullable();
            $table->string('last_name', 199)->nullable();
            $table->string('latitude', 199)->nullable();
            $table->string('longitude', 199)->nullable();
            $table->string('address', 199)->nullable();
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
        Schema::dropIfExists('petowner_user');
    }
}
