<?php

class ApiController extends BaseController {

	public function user()
	{
		return json_encode(['username' => Auth::user()->nombre]);
	}

	/* BAUTIZOS */
	/* ********************************************************************************************************************** */
	public function getBautizos()
	{
		$bautizos = Bautizo::all();
		return $bautizos->toJson();
	}

	public function postBautizo()
	{
		$inputs = Input::all();

		$bautizo = new Bautizo($inputs);

		if($bautizo->save()){
			$bautizo->error = false;
			return $bautizo->toJson();
		}else{
			return json_encode(array('error' => true));
		}

	}



	public function getTour($id = false)
	{
		if($id){
			$tour = Tour::where('id', $id)->with('items', 'files')->first();
		}else{
			$x = Cotizacion::select(DB::raw('count(*) as cantidad, tour_id'))->groupBy('tour_id')->orderBy('cantidad', 'desc')->first();

			$tour = Tour::where('id', $x->tour_id)->with('items', 'files')->first();
		}

		/* Files */
		$tour->image = '/app/images/1.jpg';

		$tour->files->each(function($f) use (&$tour){
			if($f->tipo == 1){ //image
				$tour->image = '//admin.papayote.com/uploads/tours/' . $f->file;
			}else if($f->tipo == 2){ //en
				$tour->en = 'http://admin.papayote.com/uploads/tours/' . $f->file;
			}else if($f->tipo == 3){ //es
				$tour->es = 'http://admin.papayote.com/uploads/tours/' . $f->file;
			}
		});
		/* :Files */

		$tour->role = Auth::user()->rol_id;

		$pre = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);
		$post = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);


		switch (Auth::user()->rol_id) {
			case 4:
				$mo = Indicador::where('key', 'mo')->first()->agencias;
				$mh = Indicador::where('key', 'mh')->first()->agencias;
				$d = Indicador::where('key', 'd')->first()->agencias;
				break;

			case 5:
				$mo = Indicador::where('key', 'mo')->first()->mayoristas;
				$mh = Indicador::where('key', 'mh')->first()->mayoristas;
				$d = Indicador::where('key', 'd')->first()->mayoristas;
				break;

			case 6:
				$mo = Indicador::where('key', 'mo')->first()->mayoristas_al;
				$mh = Indicador::where('key', 'mh')->first()->mayoristas_al;
				$d = Indicador::where('key', 'd')->first()->mayoristas_al;
				break;

			default:
				$mo = Indicador::where('key', 'mo')->first()->clientes_web;
				$mh = Indicador::where('key', 'mh')->first()->clientes_web;
				$d = Indicador::where('key', 'd')->first()->clientes_web;
				break;
		}


		//echo $mo ." - " . $mh. " - " .$d; exit;


		$tour->items->each(function($i) use (&$pre, &$post){

			if($i->tipo == 1){ //operacion
				$pre['1'] = $pre['1'] + $i->cant_1;
				$pre['2'] = $pre['2'] + $i->cant_2;
				$pre['3'] = $pre['3'] + $i->cant_3;
				$pre['4'] = $pre['4'] + $i->cant_4;
				$pre['5'] = $pre['5'] + $i->cant_5;
			}else if($i->tipo == 2){ //hotel
				$post['1'] = $post['1'] + $i->cant_1;
				$post['2'] = $post['2'] + $i->cant_2;
				$post['3'] = $post['3'] + $i->cant_3;
				$post['4'] = $post['4'] + $i->cant_4;
				$post['5'] = $post['5'] + $i->cant_5;
			}else{
				dd($i);
			}


		});

		// dolarize
		$total = array();
		for ($i=1; $i <= 5; $i++) {
			$total[$i] = (($pre[$i] * $mo) + ($post[$i] * $mh)) / $d;
		}

		// prices
		$prices = array();
		$individual = array();

		for ($i=2; $i <= 15; $i++) {
			if($i == 2){
				$prices[$i] = $total['2'] * $i;
				$individual[$i] = $total['2'];
			}else if($i == 3){
				$prices[$i] = $total['3'] * $i;
				$individual[$i] = $total['3'];
			}else if(($i>=4) && ($i<=8)){
				$prices[$i] = $total['4'] * $i;
				$individual[$i] = $total['4'];
			}else if($i >8){
				$prices[$i] = $total['5'] * $i;
				$individual[$i] = $total['5'];
			}
		}

		$tour->prices = $prices;
		$tour->individual = $individual;
		unset($tour->items);

		return $tour->toJson();
	}

	public function postCotizar()
	{
		$inputs = Input::all();
		$inputs['ip'] = Request::getClientIp();

		$cotizacion = new Cotizacion($inputs);

		if($cotizacion->save()){
			$cotizacion->error = false;
			return $cotizacion->toJson();
		}else{
			return json_encode(array('error' => true));
		}

	}


}
