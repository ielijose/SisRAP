<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaComuniones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('comuniones', function($table)
        {
            $table->increments('id');

            $table->string('persona');
            $table->date('fecha');
            $table->string('ministro');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('comuniones');
    }

}
