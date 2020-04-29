<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_profile', function (Blueprint $table) {
            $table->string('user_id', 199)->nullable();
            $table->string('first_name', 199)->nullable();
            $table->string('last_name', 199)->nullable();
            $table->string('mobile_no', 199)->nullable();
            $table->string('latitude', 199)->nullable();
            $table->string('longitude', 199)->nullable();
            $table->string('email', 199)->nullable();
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
        Schema::dropIfExists('po_profile');
    }
}
