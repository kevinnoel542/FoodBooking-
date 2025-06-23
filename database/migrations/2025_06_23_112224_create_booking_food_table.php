<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingFoodTable extends Migration
{
    public function up()
    {
    Schema::create('booking_food', function (Blueprint $table) {
    $table->id();
    $table->foreignId('booking_id')->constrained()->onDelete('cascade');
    $table->foreignId('food_id')->constrained('foods')->onDelete('cascade');
    $table->integer('quantity')->default(1);
    $table->timestamps();

    $table->unique(['booking_id', 'food_id']);
});

    }

    public function down()
    {
        Schema::dropIfExists('booking_food');
    }
}

