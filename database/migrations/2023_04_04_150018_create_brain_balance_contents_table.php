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
        Schema::create('brain_balance_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subCategory_id');
            $table->string('sub_cate_title')->nullable();
            $table->longText('description');
            $table->string('images')->nullable();
            $table->longText('files')->nullable();
            $table->timestamps();
            $table->foreign('subCategory_id')->references('id')->on('brain_balance_sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brain_balance_contents');
    }
};
