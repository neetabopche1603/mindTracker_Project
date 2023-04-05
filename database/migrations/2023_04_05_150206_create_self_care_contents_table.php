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
        Schema::create('self_care_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('self_category_id');
            $table->string('title');
            $table->string('description');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('total_time')->nullable();
            $table->string('my_Favourite')->nullable();
            $table->timestamps();

            $table->foreign('self_category_id')->references('id')->on('self_care_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('self_care_contents');
    }
};
