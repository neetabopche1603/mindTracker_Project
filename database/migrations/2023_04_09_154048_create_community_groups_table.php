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
        Schema::create('community_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_name')->unique();
            $table->string('group_icon');
            $table->tinyInteger('status')->comment("1=Active,0=Block")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('community_groups');
    }
};
