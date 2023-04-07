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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->tinyInteger('role')->comment('1= Therapist, 0=User');
            $table->string('avatar')->nullable();
            $table->longText('bio')->nullable();
            $table->string('ocupation')->nullable();
            $table->tinyInteger('gender')->nullable()->comment('male,female,other');
            $table->string('mobile_number')->nullable();
            $table->longText('address')->nullable();
            $table->tinyInteger('status')->comment('1=unblock, 0=block')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
