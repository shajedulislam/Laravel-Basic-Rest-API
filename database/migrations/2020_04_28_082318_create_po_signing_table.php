<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoSigningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_signing', function (Blueprint $table) {
            $table->string('user_id', 199)->nullable();
            $table->string('email', 199)->nullable();
            $table->string('mobile_no', 199)->nullable();
            $table->string('password', 199)->nullable();
            $table->string('access_token', 199)->nullable();
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
        Schema::dropIfExists('po_signing');
    }
}
