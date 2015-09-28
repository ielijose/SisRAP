<?php

class Item extends Eloquent {

    protected $table = 'items';
    public $timestamps = true;
    protected $guarded = array();

    protected $fillable = array('nombre', 'tour_id', 'cant_1', 'cant_2', 'cant_3', 'cant_4', 'cant_5');

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

    public function tour()
    {
        return $this->blongsTo('Tour');
    }

}