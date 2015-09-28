<?php

class TourArchivos extends Eloquent {

    protected $table = 'tour_archivos';
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

    /* Relationships */

}