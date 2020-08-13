<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserv_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('Reserve A Table !');
            $table->string('image')->default('defult.png');
            $table->text('detail1_title')->default('Hours')->nullable();
            $table->text('detail1_body')->default('Mon to Fri: 7:30 AM - 11:30 AM

Sat & Sun: 8:00 AM - 9:00 AM')->nullable();
            $table->text('detail2_title')->nullable();
            $table->text('detail2_body')->nullable();
            $table->text('detail3_title')->nullable();
            $table->text('detail3_body')->nullable();
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
        Schema::dropIfExists('reserv_details');
    }
}