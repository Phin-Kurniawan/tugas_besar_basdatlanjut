<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('owner_id', 20)->foreign()->references("id")->on("users");
            $table->unsignedBigInteger('pet_id', 20)->foreign()->references("id")->on("pets");
            $table->unsignedBigInteger('vet_id', 20)->foreign()->references("id")->on("vets");
            $table->unsignedBigInteger('doctor_id', 20)->foreign()->references("id")->on("users"); // kayanya gabener ini 2 foreign ke user
            $table->string('date', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
