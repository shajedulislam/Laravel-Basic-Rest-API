<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ps_verification', function (Blueprint $table) {
            $table->string('pin_code', 199)->nullable();
            $table->string('email', 199)->nullable();
            $table->string('registration_number', 199)->nullable();
            $table->string('nid_number', 199)->nullable();
            $table->string('password', 199)->nullable();
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
        Schema::dropIfExists('ps_verification');
    }
}
