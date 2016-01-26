<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaDefunciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('defunciones', function($table)
        {
            $table->increments('id');
            $table->string('libro');
            $table->string('folio');
            $table->string('numero');

            $table->string('difunto');
            $table->string('difunto_edad');
            $table->string('padre');
            $table->string('madre');
            $table->string('nacido');
            $table->string('estado');

            $table->string('fecha_sepultura');
            $table->string('ministro');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('defunciones');
    }

}
