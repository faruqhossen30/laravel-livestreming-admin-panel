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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->boolean('admin_deposit')->default(false);
            $table->string('payment_method');
            $table->integer('diamond');
            $table->string('from_account')->nullable();
            $table->string('to_account')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('description',500)->nullable();
            $table->boolean('status')->default(false);
            $table->timestamp('confirm_at')->nullable();
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
        Schema::dropIfExists('deposits');
    }
};
