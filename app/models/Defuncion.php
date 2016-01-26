<?php

class Defuncion extends Eloquent {

    protected $table = 'defunciones';
    public $timestamps = true;
    protected $guarded = array();

    protected $fillable = array('libro', 'folio', 'numero', 'difunto', 'difunto_edad', 'padre', 'madre', 'nacido', 'estado', 'fecha_sepultura', 'ministro');

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