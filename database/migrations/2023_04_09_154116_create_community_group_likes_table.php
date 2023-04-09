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
        Schema::create('community_group_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('community_group_id');
            $table->unsignedBigInteger('group_post_id');
            $table->integer('likes');
            $table->timestamps();

            $table->foreign('community_group_id')->references('id')->on('community_groups')->onDelete('cascade');
            $table->foreign('group_post_id')->references('id')->on('community_group_posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('community_group_likes');
    }
};
