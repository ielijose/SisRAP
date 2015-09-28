<?php

class Indicador extends Eloquent {

    protected $table = 'indicadores';
    public $timestamps = true;
    protected $guarded = array();

    //protected $fillable = array('nombre');

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