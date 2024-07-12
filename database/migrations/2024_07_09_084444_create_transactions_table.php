<?php
// database/migrations/create_transactions_table.php

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->string('name')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('ktp')->nullable();
            $table->string('status')->nullable();
            $table->string('backs')->nullable();
            $table->string('address')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('img')->nullable();
            $table->bigInteger('price')->nullable();
            $table->timestamps();

            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

