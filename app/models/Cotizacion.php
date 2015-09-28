<?php

class Cotizacion extends Eloquent {

    protected $table = 'cotizaciones';
    public $timestamps = true;
    protected $guarded = array();

    //protected $fillable = array('nombre', 'activo');
    /* Boot */

    public static function boot()
    {
        parent::boot();

        static::created(function($cotizacion)
        {
            /*Queue::push(function() use ($cotizacion)
            {*/
                $cotizacion->tourname = $cotizacion->tour->nombre;
                $cotizacion->mail = Mail::send('emails.cotizacion', array('cotizacion' => $cotizacion), function($message)
                {
                    $message->to('ielijose@gmail.com', 'Papayote')
                            ->subject('Nueva Cotizacion - Papayote.com');
                });
            //});
        });
    }

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

    public function tour()
    {
        return $this->belongsTo('Tour', 'tour_id');
    }

    public function files()
    {
        return $this->hasMany('TourArchivos', 'tour_id');
    }

}