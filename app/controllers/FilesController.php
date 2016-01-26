<?php

class FilesController extends BaseController {


	public function acta_bautizo()
	{
        $data = Input::all();

        $bautizo = Bautizo::find(Input::get('id'));
        if(!$bautizo){
            return Redirect::to('/?no_existe_el_bautizo=1');
        }

        $bautizo->fines = Input::get('fines');
        $bautizo->nota_marginal = Input::get('nota_marginal');
        $bautizo->observaciones = Input::get('observaciones');

        //dd($bautizo->toArray());
        return View::make('files.bautizo', compact('bautizo'));
        $html = View::make('files.bautizo', compact('bautizo'));
        return PDF::load($html, 'A4', 'portrait')->show();
	}

	public function acta_comunion()
    {
        $data = Input::all();

        $comunion = Comunion::find(Input::get('id'));
        if(!$comunion){
            return Redirect::to('/?no_existe_la_comunion=1');
        }

        $comunion->fines = Input::get('fines');
        $comunion->nota_marginal = Input::get('nota_marginal');
        $comunion->observaciones = Input::get('observaciones');

        //dd($bautizo->toArray());
        return View::make('files.comunion', compact('comunion'));
        $html = View::make('files.bautizo', compact('bautizo'));
        return PDF::load($html, 'A4', 'portrait')->show();
    }

    public function acta_confirmacion()
    {
        $data = Input::all();

        $confirmacion = Confirmacion::find(Input::get('id'));
        if(!$confirmacion){
            return Redirect::to('/?no_existe_la_confirmacion=1');
        }

        $confirmacion->fines = Input::get('fines');
        $confirmacion->nota_marginal = Input::get('nota_marginal');
        $confirmacion->observaciones = Input::get('observaciones');

        //dd($bautizo->toArray());
        return View::make('files.confirmacion', compact('confirmacion'));
        $html = View::make('files.bautizo', compact('bautizo'));
        return PDF::load($html, 'A4', 'portrait')->show();
    }

    public function acta_matrimonio()
    {
        $data = Input::all();

        $matrimonio = Matrimonio::find(Input::get('id'));
        if(!$matrimonio){
            return Redirect::to('/?no_existe_el_matrimonio=1');
        }

        $matrimonio->fines = Input::get('fines');
        $matrimonio->nota_marginal = Input::get('nota_marginal');
        $matrimonio->observaciones = Input::get('observaciones');

        //dd($bautizo->toArray());
        return View::make('files.matrimonio', compact('matrimonio'));
    }

    public function acta_defuncion()
    {
        $data = Input::all();

        $defuncion = Defuncion::find(Input::get('id'));
        if(!$defuncion){
            return Redirect::to('/?no_existe_la_defuncion=1');
        }

        $defuncion->fines = Input::get('fines');
        $defuncion->nota_marginal = Input::get('nota_marginal');
        $defuncion->observaciones = Input::get('observaciones');

        if($defuncion->observaciones == '')
            $defuncion->observaciones = 'Sin Observaciones';

        //dd($bautizo->toArray());
        return View::make('files.defuncion', compact('defuncion'));
    }

}
