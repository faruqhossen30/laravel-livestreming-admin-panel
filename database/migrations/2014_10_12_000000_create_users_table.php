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
            $table->string('email')->unique()->nullable();
            $table->string('mobile')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->boolean('is_user')->default(1);
            $table->boolean('status')->default(1);
            // Profile
            $table->string('avatar')->nullable();
            $table->integer('diamond')->nullable()->default(0);
            $table->integer('balance')->nullable()->default(0);
            $table->string('device_id')->nullable();
            $table->string('apps_id')->nullable();
            $table->rememberToken();
            $table->timestamp('name_updated_at')->nullable();
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
