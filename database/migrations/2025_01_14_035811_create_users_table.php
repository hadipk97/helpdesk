<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->longText('password')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('n_penuh')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('tel')->nullable();
            $table->string('stat')->nullable();
            $table->longText('sessionID')->nullable();
            $table->integer('isPrismakhas')->nullable();
            $table->integer('client_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
