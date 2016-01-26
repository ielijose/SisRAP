<?php

class Matrimonio extends Eloquent {

    protected $table = 'matrimonios';
    public $timestamps = true;
    protected $guarded = array();

    protected $fillable = array('libro', 'folio', 'numero', 'esposo', 'esposo_padre', 'esposo_madre', 'esposo_filiacion', 'esposo_nacido', 'esposo_estado', 'esposo_edad', 'esposo_bautizado', 'esposa', 'esposa_padre', 'esposa_madre', 'esposa_filiacion', 'esposa_nacido', 'esposa_estado', 'esposa_edad', 'esposa_bautizado', 'fecha_matrimonio', 'testigo', 'testigo2', 'ministro');

    /* Functions */

    public function getCreatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }

    public function getUpdatedAtAttribute($value)
    {
        $value = date('U', strtotime($value));
        return $value * 1000;
    }

    /* Scopes */

    /* Relationships */

}