<?php

class Comunion extends Eloquent {

    protected $table = 'comuniones';
    public $timestamps = true;
    protected $guarded = array();

    protected $fillable = array('persona', 'fecha', 'ministro');

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