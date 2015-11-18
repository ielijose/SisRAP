<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaBautizos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('bautizos', function($table)
        {
            $table->increments('id');
            $table->string('libro');
            $table->string('folio');
            $table->string('numero');
            $table->string('filiacion');

            $table->string('persona');
            $table->string('padre');
            $table->string('madre');
            $table->string('lugar_nacimiento');
            $table->string('fecha_nacimiento');

            $table->string('fecha_bautismo');
            $table->string('padrinos');
            $table->string('ministro');

            $table->string('registro_civil_numero');
            $table->string('registro_civil_libro');
            $table->string('registro_civil_ano');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('bautizos');
    }

}
