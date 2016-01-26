<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablaMatrimonios extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('matrimonios', function($table)
        {
            $table->increments('id');
            $table->string('libro');
            $table->string('folio');
            $table->string('numero');

            $table->string('esposo');
            $table->string('esposo_padre');
            $table->string('esposo_madre');
            $table->string('esposo_filiacion');
            $table->string('esposo_nacido');
            $table->string('esposo_estado');
            $table->string('esposo_edad');
            $table->string('esposo_bautizado');

            $table->string('esposa');
            $table->string('esposa_padre');
            $table->string('esposa_madre');
            $table->string('esposa_filiacion');
            $table->string('esposa_nacido');
            $table->string('esposa_estado');
            $table->string('esposa_edad');
            $table->string('esposa_bautizado');


            $table->string('fecha_matrimonio');
            $table->string('testigo');
            $table->string('testigo2');
            $table->string('ministro');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('matrimonios');
    }

}
