<?php

class Bautizo extends Eloquent {

    protected $table = 'bautizos';
    public $timestamps = true;
    protected $guarded = array();

    protected $fillable = array('libro', 'folio', 'numero', 'filiacion', 'persona', 'padre', 'madre', 'lugar_nacimiento', 'fecha_nacimiento', 'fecha_bautismo', 'padrinos', 'ministro', 'registro_civil_numero', 'registro_civil_libro', 'registro_civil_ano');

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

    public function scopeByKey($query, $key){
        return $query->where('key', $key);
    }

    /* Relationships */



}