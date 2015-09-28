<?php

class Tour extends Eloquent {

    protected $table = 'tours';
    public $timestamps = true;
    protected $guarded = array();

    protected $fillable = array('nombre', 'activo');

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
    public function scopeActive($query)
    {
        return $query->where('activo', 1);
    }

    /* Relationships */

    public function cotizaciones()
    {
        return $this->hasMany('Cotizacion');
    }

    public function items()
    {
        return $this->hasMany('Item', 'tour_id');
    }

    public function files()
    {
        return $this->hasMany('TourArchivos', 'tour_id');
    }

}