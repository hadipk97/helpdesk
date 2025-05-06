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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('kbase_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('status')->nullable();
            $table->text('attachment')->nullable();
            $table->string('created_by')->nullable();
            $table->dateTime('created_date')->nullable();
            $table->dateTime('deleted_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
