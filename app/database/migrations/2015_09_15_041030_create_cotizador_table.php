<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizadorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('cotizaciones', function($table)
        {
            $table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->string('message');

            $table->string('price');
            $table->integer('count');

            $table->string('lang');
            $table->string('ip');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cotizaciones');
    }

}
