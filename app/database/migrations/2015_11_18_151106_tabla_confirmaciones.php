<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaConfirmaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('confirmaciones', function($table)
        {
            $table->increments('id');
            $table->string('libro');
            $table->string('folio');
            $table->string('numero');

            $table->string('persona');
            $table->string('padre');
            $table->string('madre');

            $table->string('fecha');
            $table->string('padrino');
            $table->string('ministro');
            $table->string('ministro_de');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('confirmaciones');
    }

}
