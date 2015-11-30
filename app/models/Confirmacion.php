<?php

class Confirmacion extends Eloquent {

    protected $table = 'confirmaciones';
    public $timestamps = true;
    protected $guarded = array();

    protected $fillable = array('libro', 'folio', 'numero', 'persona', 'padre', 'madre', 'fecha', 'padrino', 'ministro', 'ministro_de');

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