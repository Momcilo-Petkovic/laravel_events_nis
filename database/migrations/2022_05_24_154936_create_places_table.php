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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('adress');
            $table->string('work_time');
            $table->string('max_number_people');
            $table->string('allowed_age');
            $table->string('phone_number');
            $table->longText('about');
            $table->longText('prices');
            $table->longText('image_url'); //trebalo je long text - GRESKA: SQLSTATE[22001]: String data, right truncated: 1406 Data too long for column 'image_url' at row 1
            $table->integer('type_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
};