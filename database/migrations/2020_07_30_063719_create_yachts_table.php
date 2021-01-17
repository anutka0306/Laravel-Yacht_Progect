<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYachtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yachts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('main-image');
            $table->bigInteger('base-price');
            $table->string('location');
            $table->text('description');
            $table->char('skippered');
            $table->tinyInteger('max-guests');
            $table->tinyInteger('cabins');
            $table->tinyInteger('bathrooms');
            $table->tinyInteger('berths');
            $table->tinyInteger('length');
            $table->bigInteger('max-speed');
            $table->bigInteger('fuel-tank');
            $table->bigInteger('water-tank');
            $table->bigInteger('power');
            $table->json('below-deck-equipment');
            $table->json('above-deck-equipment');
            $table->time('check-in-time');
            $table->time('check-out-time');
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
        Schema::dropIfExists('yachts');
    }
}
