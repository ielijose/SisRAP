<?php

class ApiController extends BaseController {

	public function user()
	{
		return json_encode(['username' => Auth::user()->nombre]);
	}

	public function charts()
	{
		$bautizos = Bautizo::count();
		$comuniones = Comunion::count();
		$confirmaciones = Confirmacion::count();
		$matrimonios = Matrimonio::count();
		$defunciones = Defuncion::count();


		return json_encode([
			'bautizos' => $bautizos,
			'comuniones' => $comuniones,
			'confirmaciones' => $confirmaciones,
			'matrimonios' => $matrimonios,
			'defunciones' => $defunciones,
		]);
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

	public function getBautizo($id)
	{
		$bautizo = Bautizo::find($id);
		if($bautizo){
			$bautizo->error = false;
			return $bautizo->toJson();
		}
		return json_encode(['error' => true, 'message' => 'No existe este bautizo.']);
	}

	public function putBautizo($id)
	{
		$inputs = Input::all();

		$bautizo = Bautizo::find($id);
		$bautizo->fill($inputs);
		$bautizo->fecha_nacimiento = date('d/m/Y', strtotime($inputs['fecha_nacimiento']));

		if($bautizo->save()){
			$bautizo->error = false;
			return $bautizo->toJson();
		}else{
			return json_encode(array('error' => true));
		}

	}


	/* COMUNIONES */
	/* ********************************************************************************************************************** */
	public function getComuniones()
	{
		$comuniones = Comunion::all();
		return $comuniones->toJson();
	}

	public function postComunion()
	{
		$inputs = Input::all();
		$comunion = new Comunion($inputs);

		if($comunion->save()){
			$comunion->error = false;
			return $comunion->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}


	public function getComunion($id)
	{
		$comunion = Comunion::find($id);
		if($comunion){
			$comunion->error = false;
			return $comunion->toJson();
		}
		return json_encode(['error' => true, 'message' => 'No existe esta Comunión.']);
	}

	public function putComunion($id)
	{
		$inputs = Input::all();

		$comunion = Comunion::find($id);
		$comunion->fill($inputs);
		//$comunion->fecha = date('d/m/Y', strtotime($inputs['fecha']));

		if($comunion->save()){
			$comunion->error = false;
			return $comunion->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}

	/* CONFIRMACIONES */
	/* ********************************************************************************************************************** */
	public function getConfirmaciones()
	{
		$confirmaciones = Confirmacion::all();
		return $confirmaciones->toJson();
	}

	public function postConfirmacion()
	{
		$inputs = Input::all();
		$confirmacion = new Confirmacion($inputs);

		if($confirmacion->save()){
			$confirmacion->error = false;
			return $confirmacion->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}


	public function getConfirmacion($id)
	{
		$confirmacion = Confirmacion::find($id);
		if($confirmacion){
			$confirmacion->error = false;
			return $confirmacion->toJson();
		}
		return json_encode(['error' => true, 'message' => 'No existe esta Confirmación.']);
	}

	public function putConfirmacion($id)
	{
		$inputs = Input::all();

		$comunion = Confirmacion::find($id);
		$comunion->fill($inputs);
		//$comunion->fecha = date('d/m/Y', strtotime($inputs['fecha']));

		if($comunion->save()){
			$comunion->error = false;
			return $comunion->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}

	/* MATRIMONIOS */
	/* ********************************************************************************************************************** */
	public function getMatrimonios()
	{
		$matrimonios = Matrimonio::all();
		return $matrimonios->toJson();
	}

	public function postMatrimonio()
	{
		$inputs = Input::all();
		$matrimonio = new Matrimonio($inputs);

		if($matrimonio->save()){
			$matrimonio->error = false;
			return $matrimonio->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}

	public function getMatrimonio($id)
	{
		$matrimonio = Matrimonio::find($id);
		if($matrimonio){
			$matrimonio->error = false;
			return $matrimonio->toJson();
		}
		return json_encode(['error' => true, 'message' => 'No existe este Matrimonio.']);
	}

	public function putMatrimonio($id)
	{
		$inputs = Input::all();

		$matrimonio = Matrimonio::find($id);
		$matrimonio->fill($inputs);
		//$matrimonio->fecha = date('d/m/Y', strtotime($inputs['fecha']));

		if($matrimonio->save()){
			$matrimonio->error = false;
			return $matrimonio->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}

	/* DEFUNCIONES */
	/* ********************************************************************************************************************** */
	public function getDefunciones()
	{
		$defunciones = Defuncion::all();
		return $defunciones->toJson();
	}

	public function postDefuncion()
	{
		$inputs = Input::all();
		$defuncion = new Defuncion($inputs);

		if($defuncion->save()){
			$defuncion->error = false;
			return $defuncion->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}

	public function getDefuncion($id)
	{
		$defuncion = Defuncion::find($id);
		if($defuncion){
			$defuncion->error = false;
			return $defuncion->toJson();
		}
		return json_encode(['error' => true, 'message' => 'No existe esta Defuncion.']);
	}

	public function putDefuncion($id)
	{
		$inputs = Input::all();

		$defuncion = Defuncion::find($id);
		$defuncion->fill($inputs);
		//$defuncion->fecha = date('d/m/Y', strtotime($inputs['fecha']));

		if($defuncion->save()){
			$defuncion->error = false;
			return $defuncion->toJson();
		}else{
			return json_encode(array('error' => true));
		}
	}

}