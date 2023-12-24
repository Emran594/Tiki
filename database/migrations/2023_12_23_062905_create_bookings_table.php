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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');

            // Change 'trip_name' to unsignedBigInteger to match the data type of 'id' in 'trips'
            $table->unsignedBigInteger('trip_name');

            $table->foreign('trip_name')->references('id')->on('trips');

            $table->string('booked_seat');
            $table->timestamps();
            $table->softDeletes(); // If you want to use soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
