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
        Schema::create('withdraw_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->float('diamond_rate');
            $table->integer('normar_widthraw_commission');
            $table->integer('urgent_widthraw_commission');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('withdraw_settings');
    }
};
