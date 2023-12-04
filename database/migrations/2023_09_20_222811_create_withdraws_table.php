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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('author_id')->nullable();
            $table->timestamp('time')->nullable();
            $table->float('withdraw_rate');
            $table->integer('withdraw_commission');
            $table->string('payment_method');
            $table->enum('withdraw_type',['normal','urgent'])->default('normal');
            $table->string('account');
            $table->integer('diamond');
            $table->integer('diamond_commission');
            $table->integer('total_diamond');
            $table->integer('amount');
            $table->enum('status',['pending','complete','cancle'])->default('pending');
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('withdraws');
    }
};
