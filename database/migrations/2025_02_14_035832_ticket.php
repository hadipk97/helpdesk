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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_no')->nullable();
            $table->string('requester')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('ticket_subject')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('product_type')->nullable();
            $table->string('ticket_desc')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('ticket_status')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->string('created_by')->nullable();
            $table->dateTime('deleted_date')->nullable();
            $table->string('attachment')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
