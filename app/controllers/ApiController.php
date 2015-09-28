<?php

class ApiController extends BaseController {

	public function user()
	{
		return json_encode(['username' => Auth::user()->nombre]);
	}



	public function getTours()
	{
		$tours = Tour::active()->with('items')->get();

		$tours->each(function($t) use (&$tours){
			$t->count = Cotizacion::where('tour_id', $t->id)->count();
		});

		return $tours->toJson();
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

		$pre = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);
		$post = array('1' => 0, '2' => 0, '3' => 0, '4' => 0, '5' => 0);

		$mo = Indicador::where('key', 'mo')->first()->clientes_web;
		$mh = Indicador::where('key', 'mh')->first()->clientes_web;
		$d = Indicador::where('key', 'd')->first()->clientes_web;

		$tour->items->each(function($i) use (&$pre, &$post){
			//echo $i->tipo ."<br>";

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
			}
		});

		// apply rates

		$pre['1'] = $pre['1'] * $mo;
		$pre['2'] = $pre['2'] * $mo;
		$pre['3'] = $pre['3'] * $mo;
		$pre['4'] = $pre['4'] * $mo;
		$pre['5'] = $pre['5'] * $mo;



		$post['1'] = $post['1'] * $mh;
		$post['2'] = $post['2'] * $mh;
		$post['3'] = $post['3'] * $mh;
		$post['4'] = $post['4'] * $mh;
		$post['5'] = $post['5'] * $mh;

		// dolarize

		$total = array();

		$total['1'] = ($pre['1'] + $post['1']) / $d;
		$total['2'] = ($pre['2'] + $post['2']) / $d;
		$total['3'] = ($pre['3'] + $post['3']) / $d;
		$total['4'] = ($pre['4'] + $post['4']) / $d;
		$total['5'] = ($pre['5'] + $post['5']) / $d;

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
