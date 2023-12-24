<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');

            // Change 'from' and 'to' to unsignedBigInteger
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');

            $table->foreign('from')->references('id')->on('locations');
            $table->foreign('to')->references('id')->on('locations');

            $table->string('seats');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};

